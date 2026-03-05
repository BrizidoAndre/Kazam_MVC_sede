<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SessionRegistrationRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'registration_id' => ['required', 'exists:registrations'],
            'session_id' => ['required', 'integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
