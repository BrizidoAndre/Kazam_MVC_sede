<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrganizerRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required'],
            'slug' => ['required'],
            'email' => ['nullable', 'email', 'max:254'],
            'password_hash' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
