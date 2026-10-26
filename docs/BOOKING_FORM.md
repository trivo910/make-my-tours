# Booking enquiry form

The home page booking form is anchored at `/#booking`. It collects a trip request and contact details; it is an enquiry, not an online reservation or payment.

## Fields and validation

| Field | Request key | Validation |
| --- | --- | --- |
| From | `from_location` | Required; must match a city in `config/booking.php` |
| To | `to_location` | Required; allowed city; must differ from From |
| When | `travel_date` | Required valid date; today or later |
| Time | `time_slot` | Required; Morning, Afternoon, or Evening |
| Seat | `seats` | Required integer from 1 to 60 |
| Name | `name` | Required, maximum 100 characters |
| Phone | `phone` | Required; 7–15 digits, with optional international `+`, spaces, parentheses, or hyphens |
| Email | `email` | Optional valid email address |
| Vehicle | `vehicle_type` | Optional; populated by a fleet-card Book Now link, or `?vehicle_type=...` |

Add or remove cities in `config/booking.php`; the public form and admin route filters use the same list. The `website` honeypot must remain empty and is never stored. The POST route is limited to five requests per IP in ten minutes.

## Submission flow

```text
Home form
   | POST /booking-enquiries (CSRF; fetch/AJAX or normal HTML submission)
   v
StoreBookingEnquiryRequest validates and sanitizes
   | invalid -> JSON field errors (AJAX) or redirect to /#booking with errors
   v
booking_enquiries row saved with status=new and email_status=pending
   | queued when configured, synchronous with QUEUE_CONNECTION=sync
   v
Company notification uses Email Settings recipient and optional CC/BCC
   | success -> email_status=sent; failure -> email_status=failed + email_error
   v
Visitor sees "Thanks, we will call you shortly." and the form resets
```

The record is written before email dispatch. A mail transport or dispatch failure therefore leaves a lead available to admins and does not turn a successful save into a failed booking request. When the visitor provides an email address, it is used as Reply-To. The notification also includes a WhatsApp click-to-chat link.

With JavaScript enabled, the form sends a CSRF-protected fetch request, shows a loading state, reports field errors, and resets on success. If JavaScript is unavailable, the normal POST and session redirect render the same validation and success messages. No CAPTCHA service is configured; the honeypot and per-IP throttle provide the existing spam controls.

## Admin usage

Sign in at `/admin/login`, then open **Booking Enquiries** in the sidebar. New items have a badge count. The list supports name/phone search, status, travel-date range, origin/destination filters, pagination, and CSV export. Open a row to review trip and contact details, update its status (`new`, `contacted`, `confirmed`, or `cancelled`), resend the company email, or delete it. The list also supports selecting and deleting multiple rows.

An email status of `pending` means delivery is queued or in progress. `failed` includes the saved transport error and can be retried from the detail view. With a database queue, configure a shared-hosting cron job to run Laravel's queue worker (see [Deployment](DEPLOYMENT.md)); with `QUEUE_CONNECTION=sync`, no worker or Supervisor is needed.

## Troubleshooting

- **No enquiry appears:** Check that migrations ran (`php artisan migrate --force`) and that the browser POST to `/booking-enquiries` returns `201` for AJAX or redirects to `/#booking` for normal submission.
- **AJAX behavior did not update after deployment:** Rebuild frontend assets with `npm run build` and upload `public/build/` with the same release as the application. Shared-hosting releases must include the refreshed Vite manifest and JavaScript bundle.
- **Validation errors:** Check the message beside the highlighted field. Ensure From and To differ, date is today or later, phone contains 7–15 digits, and seats are 1–60.
- **HTTP 419:** Confirm the form rendered its `@csrf` token and the browser is sending the session cookie.
- **HTTP 429:** The IP has submitted five booking requests in the previous ten minutes.
- **Email is pending:** If the configured queue is `database`, check the queue table and shared-hosting cron worker. Use `QUEUE_CONNECTION=sync` if a worker cannot be run.
- **Email is failed:** Check the email status/error in the admin detail view, then verify the company notification address and SMTP settings under **Email settings** before retrying.
- **No notification is sent:** Configure the company notification email in Email Settings; the lead still remains saved if that address or the SMTP transport is unavailable.
