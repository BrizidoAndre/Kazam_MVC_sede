<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRatingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'attendee_id' => ['required', 'exists:attendees'],
            'rating' => ['required', 'integer'],
            'created_at' => ['required', 'date'],
            'event_id' => ['required', 'exists:events'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
