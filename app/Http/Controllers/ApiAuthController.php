<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendeeRequest;
use App\Http\Resources\ApiRegistrationsResource;
use App\Http\Resources\AttendeeResource;
use App\Models\Attendee;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'lastname' => ['required'],
            'registration_code' => ['required'],
        ]);
        if ($validator->fails()) {
            return $this->message(401, ['message' => 'Invalid login']);
        }
        $attendee = Attendee::where([
            'lastname' => $request->post('lastname'),
            'registration_code' => $request->post('registration_code'),
        ])->first();
        if (!$attendee) {
            return $this->message(401, ['message' => 'Invalid login']);
        }
        $attendee->update([
            'login_token' => md5($attendee->firstname)
        ]);
        return new AttendeeResource($attendee);
    }

    public function logout()
    {
        $attendee = Attendee::where(['login_token' => request('token', '')])->first();
        if (!$attendee) {
            return $this->message(401, ['message' => 'Invalid token']);
        }
        $attendee->update([
            'login_token' => null,
        ]);
        return $this->message(200, ['message' => 'Logout success']);
    }

    public function registrations()
    {
        $attendee = Attendee::where(['login_token' => request('token', '')])->first();
        if (!$attendee) {
            return $this->message(401, ['message' => 'User not logged in']);
        }
        $attendee->load(['registrations.ticket.event.organizer', 'registrations.attendee', 'registrations.sessionRegistrations']);
        return [
            'registrations' => ApiRegistrationsResource::collection($attendee->registrations),
        ];
    }
}
