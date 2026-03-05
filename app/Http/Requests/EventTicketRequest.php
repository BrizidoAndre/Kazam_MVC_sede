<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventTicketRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'event_id' => ['nullable', 'integer'],
            'name' => ['required'],
            'cost' => ['required', 'numeric', 'min:1'],
            'special_validity' => ['nullable'],
            'special_validity.amount' => [Rule::requiredIf($this->special_validity['type'] === 'amount')],
            'special_validity.date' => [Rule::requiredIf($this->special_validity['type'] === 'date')],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
