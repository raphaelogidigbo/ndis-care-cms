<?php

namespace Tests\Feature;

use App\Enums\ReferralStatus;
use App\Filament\Resources\Referrals\Pages\ListReferrals;
use App\Models\Referral;
use App\Models\User;
use Filament\Actions\Testing\TestAction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class ReferralWorkflowTest extends TestCase
{
    use RefreshDatabase;

    public function test_new_referral_can_be_marked_contacted_then_onboarded(): void
    {
        $this->actingAs(User::factory()->create());
        $referral = Referral::factory()->create();

        Livewire::test(ListReferrals::class)
            ->callAction(TestAction::make('markContacted')->table($referral));

        $this->assertSame(ReferralStatus::Contacted, $referral->refresh()->status);

        Livewire::test(ListReferrals::class)
            ->callAction(TestAction::make('markOnboarded')->table($referral));

        $this->assertSame(ReferralStatus::Onboarded, $referral->refresh()->status);
    }

    public function test_transition_actions_are_hidden_for_wrong_status(): void
    {
        $this->actingAs(User::factory()->create());
        $referral = Referral::factory()->create();

        Livewire::test(ListReferrals::class)
            ->assertActionHidden(TestAction::make('markOnboarded')->table($referral))
            ->assertActionVisible(TestAction::make('markContacted')->table($referral));
    }
}
