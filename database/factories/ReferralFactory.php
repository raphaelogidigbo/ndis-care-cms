<?php

namespace Database\Factories;

use App\Enums\ReferralStatus;
use App\Models\Referral;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Referral>
 */
class ReferralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => ReferralStatus::New,
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'phone' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }

    public function contacted(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => ReferralStatus::Contacted,
        ]);
    }

    public function onboarded(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => ReferralStatus::Onboarded,
        ]);
    }
}
