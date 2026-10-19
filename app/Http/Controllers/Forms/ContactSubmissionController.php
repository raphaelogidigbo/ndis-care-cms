<?php

namespace App\Http\Controllers\Forms;

use App\Enums\FormSubmissionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\FormSubmission;
use App\Support\SubmissionNotifier;
use Illuminate\Http\RedirectResponse;

class ContactSubmissionController extends Controller
{
    public function __invoke(ContactRequest $request): RedirectResponse
    {
        $submission = FormSubmission::create([
            'type' => FormSubmissionType::Contact,
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'phone' => $request->validated('phone'),
            'payload' => $request->safe()->only(['message']),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        SubmissionNotifier::send($submission);

        return redirect()->route('page.show', 'thank-you');
    }
}
