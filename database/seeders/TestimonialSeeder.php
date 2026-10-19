<?php

namespace Database\Seeders;

use App\Enums\TestimonialStatus;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * DEMO CONTENT for design preview — replace with genuine, permissioned
     * testimonials before launch (developer brief: never publish placeholders).
     */
    public function run(): void
    {
        $testimonials = [
            [
                'author_name' => 'Sarah T.',
                'author_role' => 'Parent',
                'author_photo' => null,
                'content' => 'The team at Harbourview feels like family. They\'ve supported my son to be more independent and confident, and we finally feel heard.',
                'rating' => 5,
            ],
            [
                'author_name' => 'James L.',
                'author_role' => 'Participant',
                'author_photo' => null,
                'content' => 'I love the consistency — it feels like family, not just a service. Harbourview have helped me get out in the community and try new things.',
                'rating' => 5,
            ],
            [
                'author_name' => 'Melissa R.',
                'author_role' => 'Support Coordinator',
                'author_photo' => null,
                'content' => 'Professional, reliable and so easy to work with. They communicate so well and always put the participant first.',
                'rating' => 5,
            ],
            [
                'author_name' => 'David & Priya K.',
                'author_role' => 'Guardians',
                'author_photo' => null,
                'content' => 'From the first call, Harbourview took the time to understand our daughter\'s routines and preferences. The support workers are wonderful with her.',
                'rating' => 5,
            ],
            [
                'author_name' => 'Karen W.',
                'author_role' => 'Allied Health Professional',
                'author_photo' => null,
                'content' => 'I refer participants to Harbourview knowing they\'ll be genuinely cared for. Their communication during onboarding is excellent.',
                'rating' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['author_name' => $testimonial['author_name']],
                $testimonial + [
                    'status' => TestimonialStatus::Published,
                    'consent_to_publish' => true,
                ],
            );
        }
    }
}
