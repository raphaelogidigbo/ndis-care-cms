<?php

namespace Tests\Feature;

use App\Mail\SubmissionConfirmation;
use App\Mail\SubmissionNotification;
use App\Models\FormSubmission;
use App\Models\Referral;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FormSubmissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return array<string, string>
     */
    private function contactData(): array
    {
        return [
            'name' => 'Test Person',
            'email' => 'test@example.com',
            'phone' => '0400 000 000',
            'message' => 'Hello, I have a question about your services.',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function referralData(): array
    {
        return [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'birth_date' => '1990-05-10',
            'sex' => 'female',
            'phone' => '0400 123 456',
            'email' => 'jane@example.com',
            'address' => '1 Test Street, Melbourne WA',
            'ndis_number' => '430123456',
            'plan_management' => 'plan_managed',
            'ndis_plan_start' => '2026-01-01',
            'ndis_plan_end' => '2027-01-01',
            'referrer_role' => 'support_coordinator',
            'referrer_name' => 'Sam Coordinator',
            'referrer_email' => 'sam@coordinator.com',
            'source' => 'internet',
            'notes' => 'Needs SIL support.',
        ];
    }

    public function test_contact_submission_stores_record_and_redirects_to_thank_you(): void
    {
        Mail::fake();

        $this->post('/contact-us', $this->contactData())
            ->assertRedirect(route('page.show', 'thank-you'));

        $submission = FormSubmission::sole();

        $this->assertSame('contact', $submission->type->value);
        $this->assertSame('Test Person', $submission->name);
        $this->assertSame('test@example.com', $submission->email);
        $this->assertSame('Hello, I have a question about your services.', $submission->payload['message']);
        $this->assertNotNull($submission->ip);

        Mail::assertSent(SubmissionConfirmation::class, fn ($mail) => $mail->hasTo('test@example.com'));
        Mail::assertSent(SubmissionNotification::class, fn ($mail) => $mail->hasTo('info@example.com'));
    }

    public function test_contact_submission_requires_name_email_and_message(): void
    {
        $this->from('/contact-us')->post('/contact-us', [])
            ->assertSessionHasErrors(['name', 'email', 'message'])
            ->assertRedirect('/contact-us');

        $this->assertDatabaseCount('form_submissions', 0);
    }

    public function test_feedback_submission_stores_record(): void
    {
        Mail::fake();

        $this->post('/feedback', [
            'name' => 'Happy Client',
            'email' => 'happy@example.com',
            'feedback_type' => 'compliment',
            'message' => 'Great service.',
        ])->assertRedirect(route('page.show', 'thank-you'));

        $submission = FormSubmission::sole();

        $this->assertSame('feedback', $submission->type->value);
        $this->assertSame('compliment', $submission->payload['feedback_type']);
    }

    public function test_feedback_requires_email(): void
    {
        $this->post('/feedback', [
            'name' => 'No Email',
            'feedback_type' => 'suggestion',
            'message' => 'Some feedback.',
        ])->assertSessionHasErrors('email');

        $this->assertDatabaseCount('form_submissions', 0);
    }

    public function test_careers_submission_stores_resume_privately(): void
    {
        Mail::fake();
        Storage::fake('local');

        $resume = UploadedFile::fake()->createWithContent(
            'resume.pdf',
            "%PDF-1.4\n1 0 obj\n<<>>\nendobj\ntrailer\n<<>>\n%%EOF",
        );

        $this->post('/careers', [
            'name' => 'Job Seeker',
            'phone' => '0400 999 888',
            'email' => 'seeker@example.com',
            'role' => 'Support Worker',
            'resume' => $resume,
            'message' => 'I have 3 years of experience.',
        ])->assertRedirect(route('page.show', 'thank-you'));

        $submission = FormSubmission::sole();

        $this->assertSame('careers', $submission->type->value);
        $this->assertNotNull($submission->resume_path);
        $this->assertSame('resume.pdf', $submission->payload['resume_name']);
        Storage::disk('local')->assertExists($submission->resume_path);

        Mail::assertSent(SubmissionNotification::class, fn ($mail) => $mail->hasTo('hr@example.com'));
    }

    public function test_careers_rejects_disallowed_file_types(): void
    {
        Storage::fake('local');

        $file = UploadedFile::fake()->createWithContent('script.txt', 'just some text');

        $this->post('/careers', [
            'name' => 'Job Seeker',
            'phone' => '0400 999 888',
            'email' => 'seeker@example.com',
            'resume' => $file,
        ])->assertSessionHasErrors('resume');

        $this->assertDatabaseCount('form_submissions', 0);
    }

    public function test_referral_submission_creates_referral_with_mapped_fields(): void
    {
        Mail::fake();

        $this->post('/referrals', $this->referralData())
            ->assertRedirect(route('page.show', 'thank-you'));

        $referral = Referral::sole();

        $this->assertSame('Jane', $referral->first_name);
        $this->assertSame('1990-05-10', $referral->birth_date->format('Y-m-d'));
        $this->assertSame('female', $referral->sex->value);
        $this->assertSame('plan_managed', $referral->plan_management->value);
        $this->assertSame('2026-01-01', $referral->ndis_plan_start->format('Y-m-d'));
        $this->assertSame('support_coordinator', $referral->referrer_role->value);
        $this->assertSame('internet', $referral->source->value);
        $this->assertStringContainsString('Sam Coordinator', $referral->referrer_details);
        $this->assertStringContainsString('sam@coordinator.com', $referral->referrer_details);
        $this->assertStringContainsString('Needs SIL support.', $referral->referrer_details);

        // Confirmation goes to the referrer (submitter), not the participant.
        Mail::assertSent(SubmissionConfirmation::class, fn ($mail) => $mail->hasTo('sam@coordinator.com'));
        Mail::assertSent(SubmissionNotification::class, fn ($mail) => $mail->hasTo('info@example.com'));
    }

    public function test_referral_without_referrer_email_confirms_participant(): void
    {
        Mail::fake();

        $this->post('/referrals', [
            'first_name' => 'Jane',
            'last_name' => 'Doe',
            'phone' => '0400 123 456',
            'email' => 'jane@example.com',
        ])->assertRedirect(route('page.show', 'thank-you'));

        Mail::assertSent(SubmissionConfirmation::class, fn ($mail) => $mail->hasTo('jane@example.com'));
    }

    public function test_referral_requires_names_phone_and_email(): void
    {
        $this->post('/referrals', [])
            ->assertSessionHasErrors(['first_name', 'last_name', 'phone', 'email']);

        $this->assertDatabaseCount('referrals', 0);
    }

    public function test_honeypot_rejects_spam_submissions(): void
    {
        Mail::fake();

        $this->post('/contact-us', [
            ...$this->contactData(),
            'my_name' => 'spammy-bot',
        ]);

        $this->assertDatabaseCount('form_submissions', 0);
        Mail::assertNothingSent();
    }

    public function test_submissions_are_rate_limited(): void
    {
        Mail::fake();

        for ($i = 0; $i < 5; $i++) {
            $this->post('/contact-us', $this->contactData())->assertRedirect();
        }

        $this->post('/contact-us', $this->contactData())->assertTooManyRequests();
    }

    public function test_turnstile_not_enforced_without_secret_key(): void
    {
        // Secret key absent in tests — plain submissions must pass.
        $this->post('/contact-us', $this->contactData())->assertRedirect();

        $this->assertDatabaseCount('form_submissions', 1);
    }

    public function test_turnstile_fails_without_token_when_configured(): void
    {
        config()->set('services.turnstile.secret_key', 'test-secret');

        $this->post('/contact-us', $this->contactData())
            ->assertSessionHasErrors('cf-turnstile-response');

        $this->assertDatabaseCount('form_submissions', 0);
    }

    public function test_turnstile_verifies_token_against_cloudflare(): void
    {
        config()->set('services.turnstile.secret_key', 'test-secret');
        Mail::fake();

        Http::fake([
            'challenges.cloudflare.com/*' => Http::response(['success' => true]),
        ]);

        $this->post('/contact-us', [
            ...$this->contactData(),
            'cf-turnstile-response' => 'valid-token',
        ])->assertRedirect(route('page.show', 'thank-you'));

        $this->assertDatabaseCount('form_submissions', 1);
    }

    public function test_turnstile_rejects_failed_verification(): void
    {
        config()->set('services.turnstile.secret_key', 'test-secret');

        Http::fake([
            'challenges.cloudflare.com/*' => Http::response(['success' => false]),
        ]);

        $this->post('/contact-us', [
            ...$this->contactData(),
            'cf-turnstile-response' => 'bad-token',
        ])->assertSessionHasErrors('cf-turnstile-response');

        $this->assertDatabaseCount('form_submissions', 0);
    }
}
