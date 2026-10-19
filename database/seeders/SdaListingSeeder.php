<?php

namespace Database\Seeders;

use App\Enums\SdaDesignCategory;
use App\Enums\SdaListingStatus;
use App\Models\SdaListing;
use Illuminate\Database\Seeder;

class SdaListingSeeder extends Seeder
{
    /**
     * Sample SDA vacancies — replace or remove via the SDA Housing resource
     * in the admin panel, or by dropping this seeder.
     *
     * @var array<int, array{title: string, suburb: string, design_category: SdaDesignCategory, bedrooms: int, bathrooms: int, status: SdaListingStatus, image: string, summary: string}>
     */
    private const LISTINGS = [
        [
            'title' => 'Melbourne Accessible Villa',
            'suburb' => 'Melbourne',
            'design_category' => SdaDesignCategory::FullyAccessible,
            'bedrooms' => 2,
            'bathrooms' => 2,
            'status' => SdaListingStatus::Available,
            'image' => 'Shared-Living-Support-ndis-2.png',
            'summary' => 'Step-free villa with wide doorways and an accessible bathroom, close to shops and public transport.',
        ],
        [
            'title' => 'Gosnells Group Home',
            'suburb' => 'Gosnells',
            'design_category' => SdaDesignCategory::Robust,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'status' => SdaListingStatus::ComingSoon,
            'image' => 'stock-house-exterior.jpg',
            'summary' => 'Durable, low-sensory group home with open-plan living and a secure backyard.',
        ],
        [
            'title' => 'Bentley High-Support Unit',
            'suburb' => 'Bentley',
            'design_category' => SdaDesignCategory::HighPhysicalSupport,
            'bedrooms' => 1,
            'bathrooms' => 1,
            'status' => SdaListingStatus::Available,
            'image' => 'stock-wheelchair-kitchen.jpg',
            'summary' => 'Single unit with ceiling-hoist provisions, accessible kitchen and emergency power backup.',
        ],
        [
            'title' => 'Armadale Garden Apartment',
            'suburb' => 'Armadale',
            'design_category' => SdaDesignCategory::ImprovedLiveability,
            'bedrooms' => 2,
            'bathrooms' => 1,
            'status' => SdaListingStatus::Tenanted,
            'image' => 'Shared-Living-Support-ndis-5-md.png',
            'summary' => 'Bright apartment with improved acoustic and lighting design for enhanced liveability.',
        ],
    ];

    public function run(): void
    {
        foreach (self::LISTINGS as $index => $listing) {
            SdaListing::updateOrCreate(
                ['title' => $listing['title']],
                $listing + ['sort_order' => $index + 1, 'is_published' => true],
            );
        }
    }
}
