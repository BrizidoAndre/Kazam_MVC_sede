<?php

namespace App\Http\Requests;

use App\Models\Session;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SessionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'room_id' => ['required', 'exists:rooms,id'],
            'title' => ['required'],
            'description' => ['required'],
            'speaker' => ['required'],
            'start' => ['required', 'date', Rule::when(request()->filled(['start', 'end', 'room_id']), [function ($att, $value, $fail) {
                $values = request(['start', 'end', 'room_id']);
                if (Session::where(['room_id' => $values['room_id']])
                    ->where('end', '>', $values['start'])
                    ->where('start', '<', $values['end'])->exists()) {
                    $fail('Room already booked during this time');
                }
            }])],
            'end' => ['required', 'date'],
            'type' => ['required'],
            'cost' => ['nullable', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
