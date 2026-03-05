<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
{
    public function rules(): array
    {
        $model = request('model');
        return [
            'organizer_id' => ['nullable', 'integer'],
            'name' => ['required'],
            'slug' => [
                'required',
                'regex:/^[A-Za-z0-9\-]+$/',
                Rule::unique('events')->ignore($model)],
            'date' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'slug.regex' => 'Slug must not be empty and only contain a-z, 0-9 and \'-\'',
            'slug.unique' => 'Slug is already used'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
