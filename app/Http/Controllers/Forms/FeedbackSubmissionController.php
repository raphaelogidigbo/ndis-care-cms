<?php

namespace App\Http\Controllers\Forms;

use App\Enums\FormSubmissionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\FormSubmission;
use App\Support\SubmissionNotifier;
use Illuminate\Http\RedirectResponse;

class FeedbackSubmissionController extends Controller
{
    public function __invoke(FeedbackRequest $request): RedirectResponse
    {
        $submission = FormSubmission::create([
            'type' => FormSubmissionType::Feedback,
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'phone' => $request->validated('phone'),
            'payload' => $request->safe()->only(['feedback_type', 'message']),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        SubmissionNotifier::send($submission);

        return redirect()->route('page.show', 'thank-you');
    }
}
