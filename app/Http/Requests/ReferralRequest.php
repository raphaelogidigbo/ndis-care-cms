<?php

namespace App\Http\Requests;

use App\Enums\PlanManagement;
use App\Enums\ReferralSource;
use App\Enums\ReferrerRole;
use App\Enums\Sex;
use App\Rules\Turnstile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReferralRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:80'],
            'last_name' => ['required', 'string', 'max:80'],
            'birth_date' => ['nullable', 'date', 'before:today'],
            'sex' => ['nullable', Rule::enum(Sex::class)],
            'phone' => ['required', 'string', 'max:40'],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'ndis_number' => ['nullable', 'string', 'max:20'],
            'plan_management' => ['nullable', Rule::enum(PlanManagement::class)],
            'ndis_plan_start' => ['nullable', 'date'],
            'ndis_plan_end' => ['nullable', 'date', 'after_or_equal:ndis_plan_start'],
            'referrer_role' => ['nullable', Rule::enum(ReferrerRole::class)],
            'referrer_name' => ['nullable', 'string', 'max:120'],
            'referrer_email' => ['nullable', 'email', 'max:255'],
            'source' => ['nullable', Rule::enum(ReferralSource::class)],
            'notes' => ['nullable', 'string', 'max:5000'],
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
