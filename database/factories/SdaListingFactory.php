<?php

namespace Database\Factories;

use App\Enums\SdaDesignCategory;
use App\Enums\SdaListingStatus;
use App\Models\SdaListing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SdaListing>
 */
class SdaListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'suburb' => $this->faker->city(),
            'design_category' => $this->faker->randomElement(SdaDesignCategory::cases()),
            'bedrooms' => $this->faker->numberBetween(1, 4),
            'bathrooms' => $this->faker->numberBetween(1, 2),
            'status' => SdaListingStatus::Available,
            'summary' => $this->faker->sentence(),
            'is_published' => true,
            'sort_order' => 0,
        ];
    }
}
