<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class Turnstile implements ValidationRule
{
    /**
     * Full rule set for the `cf-turnstile-response` field. The field is
     * only required once a secret key is configured — without one the
     * widget isn't rendered and nothing is enforced.
     *
     * @return array<int, mixed>
     */
    public static function rules(): array
    {
        return [
            Rule::requiredIf(filled(config('services.turnstile.secret_key'))),
            new self,
        ];
    }

    /**
     * Verify the Cloudflare Turnstile response token. No-ops when no
     * secret key is configured so local/dev environments are unaffected.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $secret = config('services.turnstile.secret_key');

        if (blank($secret)) {
            return;
        }

        if (! is_string($value) || $value === '') {
            $fail('Please complete the verification check.');

            return;
        }

        $passed = Http::asForm()->timeout(10)->post(
            'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            [
                'secret' => $secret,
                'response' => $value,
                'remoteip' => request()->ip(),
            ],
        )->json('success') === true;

        if (! $passed) {
            $fail('Verification failed — please try again.');
        }
    }
}
