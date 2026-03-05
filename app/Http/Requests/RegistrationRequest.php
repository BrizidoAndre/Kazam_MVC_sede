<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'attendee_id' => ['required', 'exists:attendees'],
            'ticket_id' => ['required', 'exists:event_tickets'],
            'registration_time' => ['nullable', 'date'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
