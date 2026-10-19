<?php

namespace Tests\Feature;

use App\Enums\TestimonialStatus;
use App\Filament\Resources\Testimonials\Pages\ListTestimonials;
use App\Models\Testimonial;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TestimonialWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_draft_can_be_approved(): void
    {
        $this->actingAs(User::factory()->create());
        $testimonial = Testimonial::factory()->create();

        Livewire::test(ListTestimonials::class)
            ->callAction(TestAction::make('approve')->table($testimonial));

        $this->assertSame(TestimonialStatus::Approved, $testimonial->refresh()->status);
    }

    public function test_approved_testimonial_with_consent_can_be_published(): void
    {
        $this->actingAs(User::factory()->create());
        $testimonial = Testimonial::factory()->approved()->withConsent()->create();

        Livewire::test(ListTestimonials::class)
            ->callAction(TestAction::make('publish')->table($testimonial));

        $this->assertSame(TestimonialStatus::Published, $testimonial->refresh()->status);
    }

    public function test_publish_is_blocked_without_consent(): void
    {
        $this->actingAs(User::factory()->create());
        $testimonial = Testimonial::factory()->approved()->create(['consent_to_publish' => false]);

        Livewire::test(ListTestimonials::class)
            ->callAction(TestAction::make('publish')->table($testimonial))
            ->assertNotified('Cannot publish without recorded consent');

        $this->assertSame(TestimonialStatus::Approved, $testimonial->refresh()->status);
    }

    public function test_published_testimonial_can_be_unpublished(): void
    {
        $this->actingAs(User::factory()->create());
        $testimonial = Testimonial::factory()->published()->create();

        Livewire::test(ListTestimonials::class)
            ->callAction(TestAction::make('unpublish')->table($testimonial));

        $this->assertSame(TestimonialStatus::Approved, $testimonial->refresh()->status);
    }
}
