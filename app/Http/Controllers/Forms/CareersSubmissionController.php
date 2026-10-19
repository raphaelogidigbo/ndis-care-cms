<?php

namespace App\Http\Controllers\Forms;

use App\Enums\FormSubmissionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareersRequest;
use App\Models\FormSubmission;
use App\Support\SubmissionNotifier;
use Illuminate\Http\RedirectResponse;

class CareersSubmissionController extends Controller
{
    public function __invoke(CareersRequest $request): RedirectResponse
    {
        $resume = $request->file('resume');

        $submission = FormSubmission::create([
            'type' => FormSubmissionType::Careers,
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'phone' => $request->validated('phone'),
            'payload' => array_filter([
                'role' => $request->validated('role'),
                'message' => $request->validated('message'),
                'resume_name' => $resume?->getClientOriginalName(),
            ]),
            'resume_path' => $resume?->store('resumes', 'local'),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        SubmissionNotifier::send($submission);

        return redirect()->route('page.show', 'thank-you');
    }
}
