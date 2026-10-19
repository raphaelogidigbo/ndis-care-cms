<?php

namespace Database\Factories;

use App\Models\JobListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<JobListing>
 */
class JobListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'location' => 'Melbourne, WA',
            'employment_type' => fake()->randomElement(['casual', 'part_time', 'full_time', 'contract']),
            'summary' => fake()->sentence(),
            'is_open' => true,
            'sort_order' => 0,
        ];
    }
}
