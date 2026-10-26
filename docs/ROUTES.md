# Routes

| Method | Path | Purpose | Access |
| --- | --- | --- | --- |
| GET | `/contact` | Public contact form | Public |
| POST | `/contact` | Validate, store and notify | Public, throttled |
| POST | `/booking-enquiries` | Validate, save and notify booking enquiry | Public, CSRF protected, throttled |
| GET | `/blog` and `/blog/{slug}` | Public blog listing/detail | Public |
| GET | `/blog/category/{slug}`, `/blog/tag/{slug}` | Blog taxonomy | Public |
| GET | `/sitemap.xml` | Sitemap | Public |
| GET/POST | `/admin/login` | Admin sign in | Guest |
| GET/POST | `/admin/forgot-password` | Password recovery request | Guest |
| GET/POST | `/admin/settings/email` | SMTP settings and test | Admin |
| GET | `/admin/contacts` | Submissions list and filters | Admin |
| GET | `/admin/contacts/export` | Filtered CSV export | Admin |
| GET | `/admin/contacts/{submission}` | Submission detail | Admin |
| GET | `/admin/booking-enquiries` | Searchable/filterable booking enquiry list | Admin |
| GET | `/admin/booking-enquiries/export` | Filtered booking enquiry CSV export | Admin |
| POST | `/admin/booking-enquiries/bulk-delete` | Delete selected booking enquiries | Admin |
| GET | `/admin/booking-enquiries/{bookingEnquiry}` | Booking enquiry detail | Admin |
| PATCH | `/admin/booking-enquiries/{bookingEnquiry}/status` | Update booking enquiry status | Admin |
| POST | `/admin/booking-enquiries/{bookingEnquiry}/resend` | Retry company notification email | Admin |
| DELETE | `/admin/booking-enquiries/{bookingEnquiry}` | Delete a booking enquiry | Admin |

The full current route names and methods are available with `php artisan route:list`.
