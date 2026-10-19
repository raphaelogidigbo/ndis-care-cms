<?php

namespace App\Filament\Widgets;

use App\Enums\FormSubmissionStatus;
use App\Enums\ReferralStatus;
use App\Enums\TestimonialStatus;
use App\Filament\Resources\Referrals\ReferralResource;
use App\Models\FormSubmission;
use App\Models\Referral;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class IntakeStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New referrals', Referral::where('status', ReferralStatus::New)->count())
                ->description('Awaiting first contact')
                ->descriptionIcon('heroicon-o-user-plus')
                ->color('info')
                ->url(ReferralResource::getUrl('index')),
            Stat::make('Unread submissions', FormSubmission::where('status', FormSubmissionStatus::New)->count())
                ->description('Contact, feedback & careers')
                ->descriptionIcon('heroicon-o-inbox-stack')
                ->color('warning'),
            Stat::make('Spam flagged', FormSubmission::where('is_spam', true)->count())
                ->description('Submissions marked as spam')
                ->descriptionIcon('heroicon-o-exclamation-triangle')
                ->color('danger'),
            Stat::make('Draft testimonials', Testimonial::where('status', TestimonialStatus::Draft)->count())
                ->description('Awaiting review')
                ->descriptionIcon('heroicon-o-chat-bubble-bottom-center-text')
                ->color('gray'),
        ];
    }
}
