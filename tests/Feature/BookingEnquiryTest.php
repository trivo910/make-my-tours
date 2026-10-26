<?php

namespace Tests\Feature;

use App\Mail\BookingEnquiryNotificationMail;
use App\Models\BookingEnquiry;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class BookingEnquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_booking_form_posts_with_csrf_and_required_contact_fields(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('action="'.route('booking-enquiries.store').'"', false)
            ->assertSee('name="_token"', false)
            ->assertSee('name="name"', false)
            ->assertSee('name="phone"', false)
            ->assertSee('name="from_location"', false);
    }

    public function test_valid_booking_is_saved_and_company_email_is_sent(): void
    {
        Setting::create(['key' => 'company_notification_email', 'value' => 'team@example.com']);
        Mail::fake();

        $this->postJson(route('booking-enquiries.store'), $this->validEnquiry())
            ->assertCreated()
            ->assertJsonPath('message', 'Thanks, we will call you shortly.');

        $enquiry = BookingEnquiry::firstOrFail();
        $this->assertSame('new', $enquiry->status);
        $this->assertSame('sent', $enquiry->email_status);
        $this->assertSame('Pune', $enquiry->to_location);

        Mail::assertSent(BookingEnquiryNotificationMail::class, fn (BookingEnquiryNotificationMail $mail) =>
            $mail->enquiry->id === $enquiry->id
        );
        $notification = Mail::sent(BookingEnquiryNotificationMail::class)->first();
        $notification->build();
        $this->assertSame('New booking enquiry: Mumbai to Pune on '.now()->addDay()->format('j M').' (Morning, 4 seats)', $notification->subject);
        $this->assertTrue($notification->hasReplyTo('asha@example.com'));
    }

    public function test_optional_email_can_be_omitted(): void
    {
        $data = $this->validEnquiry();
        unset($data['email']);

        $this->postJson(route('booking-enquiries.store'), $data)->assertCreated();

        $this->assertDatabaseHas('booking_enquiries', [
            'name' => 'Asha Visitor',
            'email' => null,
        ]);
    }

    public function test_normal_post_fallback_redirects_with_success_and_field_errors(): void
    {
        $success = $this->post(route('booking-enquiries.store'), $this->validEnquiry());
        $success->assertRedirect(url('/').'#booking')->assertSessionHas('booking_success', 'Thanks, we will call you shortly.');
        $this->get('/')->assertSee('Thanks, we will call you shortly.');

        $this->post(route('booking-enquiries.store'), array_replace($this->validEnquiry(), ['name' => '']))
            ->assertRedirect(url('/').'#booking')
            ->assertSessionHasErrors('name');
        $this->get('/')->assertSee('The name field is required.');
    }

    public function test_booking_validation_rejects_same_city_past_date_bad_phone_and_seat_limits(): void
    {
        $invalidRequests = [
            [['to_location' => 'Mumbai'], ['to_location']],
            [['travel_date' => now()->subDay()->toDateString()], ['travel_date']],
            [['phone' => 'not-a-phone'], ['phone']],
            [['seats' => 0], ['seats']],
            [['seats' => 61], ['seats']],
        ];

        foreach ($invalidRequests as [$overrides, $errors]) {
            $this->postJson(route('booking-enquiries.store'), array_replace($this->validEnquiry(), $overrides))
                ->assertUnprocessable()
                ->assertJsonValidationErrors($errors);
        }

        $this->assertDatabaseCount('booking_enquiries', 0);
    }

    public function test_mail_failure_does_not_discard_the_saved_enquiry(): void
    {
        Setting::create(['key' => 'company_notification_email', 'value' => 'team@example.com']);
        Mail::shouldReceive('to')->once()->with('team@example.com')->andThrow(new \RuntimeException('Connection refused'));

        $this->postJson(route('booking-enquiries.store'), $this->validEnquiry())
            ->assertCreated();

        $this->assertDatabaseHas('booking_enquiries', [
            'name' => 'Asha Visitor',
            'email_status' => 'failed',
            'email_error' => 'Connection refused',
        ]);
    }

    public function test_honeypot_submissions_are_acknowledged_without_saving(): void
    {
        $this->postJson(route('booking-enquiries.store'), array_merge($this->validEnquiry(), ['website' => 'spam.example']))
            ->assertCreated();

        $this->assertDatabaseCount('booking_enquiries', 0);
    }

    public function test_booking_submissions_are_limited_to_five_per_ten_minutes_per_ip(): void
    {
        Setting::create(['key' => 'company_notification_email', 'value' => 'team@example.com']);
        Mail::fake();

        for ($submission = 0; $submission < 5; $submission++) {
            $this->postJson(route('booking-enquiries.store'), $this->validEnquiry())
                ->assertCreated();
        }

        $this->postJson(route('booking-enquiries.store'), $this->validEnquiry())
            ->assertTooManyRequests();

        $this->assertDatabaseCount('booking_enquiries', 5);
    }

    public function test_admin_can_filter_update_status_resend_export_and_delete_booking_enquiries(): void
    {
        Setting::create(['key' => 'company_notification_email', 'value' => 'team@example.com']);
        Mail::fake();
        $admin = User::factory()->create(['role' => 'admin']);
        $enquiry = BookingEnquiry::create($this->validEnquiry());

        $this->actingAs($admin)
            ->get(route('admin.booking-enquiries.index', ['search' => 'Asha', 'status' => 'new']))
            ->assertOk()
            ->assertSee('Asha Visitor')
            ->assertSee('Mumbai → Pune');

        $this->actingAs($admin)
            ->get(route('admin.booking-enquiries.show', $enquiry))
            ->assertOk()
            ->assertSee('TRIP DETAILS')
            ->assertSee('Message traveller')
            ->assertSee('https://wa.me/919876543210', false);

        $this->actingAs($admin)
            ->patch(route('admin.booking-enquiries.update-status', $enquiry), ['status' => 'contacted'])
            ->assertRedirect();
        $this->assertDatabaseHas('booking_enquiries', ['id' => $enquiry->id, 'status' => 'contacted']);

        $this->actingAs($admin)
            ->post(route('admin.booking-enquiries.resend', $enquiry))
            ->assertRedirect();
        Mail::assertSent(BookingEnquiryNotificationMail::class);

        $export = $this->actingAs($admin)->get(route('admin.booking-enquiries.export'));
        $export->assertOk();
        $this->assertStringContainsString('Travel date', $export->streamedContent());

        $anotherEnquiry = BookingEnquiry::create(array_replace($this->validEnquiry(), ['name' => 'Second Visitor']));
        $this->actingAs($admin)
            ->post(route('admin.booking-enquiries.bulk-destroy'), ['booking_enquiry_ids' => [$anotherEnquiry->id]])
            ->assertRedirect();
        $this->assertDatabaseMissing('booking_enquiries', ['id' => $anotherEnquiry->id]);

        $this->actingAs($admin)
            ->delete(route('admin.booking-enquiries.destroy', $enquiry))
            ->assertRedirect(route('admin.booking-enquiries.index'));
        $this->assertDatabaseMissing('booking_enquiries', ['id' => $enquiry->id]);
    }

    private function validEnquiry(): array
    {
        return [
            'name' => 'Asha Visitor',
            'phone' => '+91 98765 43210',
            'email' => 'asha@example.com',
            'from_location' => 'Mumbai',
            'to_location' => 'Pune',
            'travel_date' => now()->addDay()->toDateString(),
            'time_slot' => 'Morning',
            'seats' => 4,
            'vehicle_type' => 'AC Bus',
            'website' => '',
        ];
    }
}
