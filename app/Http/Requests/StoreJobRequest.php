<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Full Time', 'Part Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
