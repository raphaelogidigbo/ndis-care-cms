<?php

namespace App\Http\Requests;

use App\Rules\Turnstile;
use Illuminate\Foundation\Http\FormRequest;

class CareersRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, mixed>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:255'],
            'role' => ['nullable', 'string', 'max:120'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5120'],
            'message' => ['nullable', 'string', 'max:5000'],
            'cf-turnstile-response' => Turnstile::rules(),
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return ['cf-turnstile-response' => 'verification'];
    }
}
