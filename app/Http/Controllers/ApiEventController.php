<?php

namespace App\Http\Controllers;

use App\Http\Resources\EventResource;
use App\Http\Resources\SingleEventResource;
use App\Models\Attendee;
use App\Models\Event;
use App\Models\EventTicket;
use App\Models\Organizer;
use App\Models\Registration;
use App\Models\SessionRegistration;
use Illuminate\Http\Request;
use Pest\Collision\Events;

class ApiEventController extends Controller
{
    public function index()
    {
        $events = Event::query()->with('organizer')
            ->whereTodayOrAfter('date')
            ->get();
        return ['events' => EventResource::collection($events)];
    }

    public function view($organizer_slug, $event_slug)
    {
        $organizer = Organizer::where(['slug' => $organizer_slug])->first();
        if (!$organizer) {
            return $this->message(404, ['message' => 'Organizer not found']);
        }
        $event = Event::where([
            'organizer_id' => $organizer->id,
            'slug' => $event_slug,
        ])->first();
        if (!$event) {
            return $this->message(404, ['message' => 'Event not found']);
        }
        $event->load(['eventTickets', 'channels.rooms.sessions']);

        return new SingleEventResource($event);
    }

    public function register(Request $request, $organizer_slug, $event_slug)
    {
        $attendee = Attendee::where(['login_token' => request('token', '')])->first();
        if (!$attendee) {
            return $this->message(401, ['message' => 'User not logged in']);
        }
        $validator = \Validator::make($request->all(), [
            'ticket_id' => ['required', 'exists:event_tickets,id'],
            'session_ids' => ['array'],
            'session_ids.*' => ['integer', 'exists:sessions,id'],
        ]);
        if ($validator->fails()) {
            return $this->message(401, ['message' => $validator->errors()->first()]);
        }
        $event = Event::with('eventTickets')->where(['slug' => $event_slug])->first();
        $alreadyRegistered = Registration::whereIn('ticket_id', $event->eventTickets->pluck('id'))->where(['attendee_id' => $attendee->id])->exists();
        if ($alreadyRegistered) {
            return $this->message(401, ['message' => 'User already registered']);
        }
        $isAvailable = EventTicket::find($request->input('ticket_id'))->isValid();
        if (!$isAvailable) {
            return $this->message(401, ['message' => 'Ticket is no longer available']);
        }
        $registration = Registration::create([
            'ticket_id' => $request->input('ticket_id'),
            'attendee_id' => $attendee->id,
            'registration_time' => now(),
        ]);
        if ($request->has('session_ids')) {
            foreach ($request->input('session_ids', []) as $item) {
                SessionRegistration::create([
                    'registration_id' => $registration->id,
                    'session_id' => $item,
                ]);
            }
        }
        return $this->message(200, ['message' => 'Registration successful']);
    }
}
