<?php

namespace App\Http\Controllers\Forms;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReferralRequest;
use App\Models\Referral;
use App\Support\SubmissionNotifier;
use Illuminate\Http\RedirectResponse;

class ReferralSubmissionController extends Controller
{
    public function __invoke(ReferralRequest $request): RedirectResponse
    {
        $referral = Referral::create([
            ...$request->safe()->except(['referrer_name', 'referrer_email', 'notes', 'cf-turnstile-response']),
            'referrer_details' => $this->referrerDetails($request),
        ]);

        SubmissionNotifier::send(
            $referral,
            submitterEmail: $request->input('referrer_email') ?: $referral->email,
            submitterName: $request->input('referrer_name') ?: $referral->first_name,
        );

        return redirect()->route('page.show', 'thank-you');
    }

    /**
     * Pack the non-column referrer fields into the details text shown in
     * the admin infolist.
     */
    private function referrerDetails(ReferralRequest $request): ?string
    {
        $lines = [];

        if ($request->filled('referrer_name')) {
            $lines[] = 'Name: '.$request->input('referrer_name');
        }

        if ($request->filled('referrer_email')) {
            $lines[] = 'Email: '.$request->input('referrer_email');
        }

        if ($request->filled('notes')) {
            $lines[] = "Notes:\n".$request->input('notes');
        }

        return $lines === [] ? null : implode("\n", $lines);
    }
}
