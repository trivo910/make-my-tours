<?php

namespace Tests\Feature;

use App\Mail\ContactNotificationMail;
use App\Models\ContactSubmission;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_contact_page_is_public_and_submission_is_saved_and_notified(): void
    {
        Setting::create(['key' => 'company_notification_email', 'value' => 'team@example.com']);
        Mail::fake();

        $response = $this->post(route('contact.store'), [
            'name' => 'Asha Visitor', 'email' => 'asha@example.com', 'phone' => '+91 9876543210',
            'address' => 'Mumbai', 'message' => 'Please share the itinerary details.', 'website' => '',
        ]);

        $response->assertRedirect(route('contact.create'));
        $this->assertDatabaseHas('contact_submissions', [
            'name' => 'Asha Visitor', 'email' => 'asha@example.com', 'email_status' => 'sent',
        ]);
        Mail::assertSent(ContactNotificationMail::class, fn ($mail) => $mail->submission->email === 'asha@example.com');
    }

    public function test_invalid_contact_data_is_rejected(): void
    {
        $this->from(route('contact.create'))->post(route('contact.store'), [
            'name' => '', 'email' => 'not-an-email', 'phone' => '12', 'message' => 'short',
        ])->assertRedirect(route('contact.create'))->assertSessionHasErrors(['name', 'email', 'phone', 'message']);

        $this->assertDatabaseCount('contact_submissions', 0);
    }

    public function test_honeypot_submission_returns_success_without_saving(): void
    {
        $this->postJson(route('contact.store'), [
            'name' => 'Bot', 'email' => 'bot@example.com', 'phone' => '1234567890',
            'message' => 'This is a sufficiently long message.', 'website' => 'spam.example',
            'address' => 'Test address',
        ])->assertCreated();

        $this->assertDatabaseCount('contact_submissions', 0);
    }

    public function test_notification_failure_keeps_submission_and_records_actual_error(): void
    {
        Setting::create(['key' => 'company_notification_email', 'value' => 'team@example.com']);
        Mail::shouldReceive('to')->once()->andThrow(new \RuntimeException('Connection refused'));

        $this->postJson(route('contact.store'), [
            'name' => 'Asha Visitor', 'email' => 'asha@example.com', 'phone' => '9876543210',
            'message' => 'Please share the itinerary details.',
            'address' => 'Mumbai',
        ])->assertCreated();

        $this->assertDatabaseHas('contact_submissions', [
            'email' => 'asha@example.com', 'email_status' => 'failed', 'email_error' => 'Connection refused',
        ]);
    }

    public function test_admin_can_review_mark_read_export_and_delete_submissions(): void
    {
        $admin = \App\Models\User::factory()->create(['role' => 'admin']);
        $submission = ContactSubmission::create([
            'name' => '=Formula', 'email' => 'visitor@example.com', 'phone' => '9876543210',
            'address' => 'Mumbai', 'message' => 'Please call me about a tour.', 'email_status' => 'failed', 'email_error' => 'Connection refused',
        ]);

        $this->actingAs($admin)->get(route('admin.contacts.index'))->assertOk()->assertSee('=Formula');
        $this->actingAs($admin)->get(route('admin.contacts.show', $submission))->assertOk();
        $this->assertDatabaseHas('contact_submissions', ['id' => $submission->id, 'is_read' => true]);
        $export = $this->actingAs($admin)->get(route('admin.contacts.export'));
        $export->assertOk();
        $this->assertStringContainsString("'=Formula", $export->streamedContent());
        $this->actingAs($admin)->delete(route('admin.contacts.destroy', $submission))->assertRedirect(route('admin.contacts.index'));
        $this->assertDatabaseMissing('contact_submissions', ['id' => $submission->id]);
    }
}
