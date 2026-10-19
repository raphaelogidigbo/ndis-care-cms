<?php

namespace App\Http\Requests;

use App\Rules\Turnstile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeedbackRequest extends FormRequest
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
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:40'],
            'feedback_type' => ['required', Rule::in(['compliment', 'suggestion', 'complaint'])],
            'message' => ['required', 'string', 'max:5000'],
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
