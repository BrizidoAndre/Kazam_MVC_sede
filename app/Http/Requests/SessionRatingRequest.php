<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRatingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'attendee_id' => ['required', 'exists:attendees'],
            'rating' => ['required', 'integer'],
            'created_at' => ['required', 'date'],
            'session_id' => ['required', 'exists:sessions'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
