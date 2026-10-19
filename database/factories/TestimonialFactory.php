<?php

namespace Database\Factories;

use App\Enums\TestimonialStatus;
use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => TestimonialStatus::Draft,
            'author_name' => fake()->name(),
            'author_role' => fake()->optional()->jobTitle(),
            'author_photo' => null,
            'content' => fake()->paragraph(),
            'rating' => fake()->optional()->numberBetween(1, 5),
            'consent_to_publish' => false,
        ];
    }

    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => TestimonialStatus::Approved,
        ]);
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => TestimonialStatus::Published,
            'consent_to_publish' => true,
        ]);
    }

    public function withConsent(): static
    {
        return $this->state(fn (array $attributes) => [
            'consent_to_publish' => true,
        ]);
    }
}
