<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::getFromuser()->withCount('registrations')->get();
        return view('events.index', [
            'events' => $events
        ]);
    }

    public function create()
    {
        return view('events.create', [
            'model' => new Event()
        ]);
    }

    public function store(EventRequest $request)
    {
        $model = Event::create([...$request->validated(), 'organizer_id' => auth()->id()]);
        session()->flash('info', 'Event successfully created');
        return redirect()->route('event.detail', $model);
    }

    public function detail(Event $model)
    {
        $model->load([
            'channels' => function ($q) {
                $q->withCount('sessions');
                $q->withCount('rooms');
            },
            'channels.rooms.sessions',
            'registrations',
            'eventTickets',
            'organizer'
        ]);
        return view('events.detail', [
            'model' => $model,
        ]);
    }

    public function edit(Event $model)
    {
        return view('events.edit', [
            'model' => $model
        ]);
    }

    public function update(EventRequest $request, Event $model)
    {
        $model->update($request->validated());
        session()->flash('info', 'Event successfully updated');
        return redirect()->route('event.detail', [
            'model' => $model
        ]);
    }
}
