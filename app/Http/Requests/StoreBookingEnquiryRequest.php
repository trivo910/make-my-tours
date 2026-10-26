<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreBookingEnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $clean = static function (mixed $value): mixed {
            if (! is_string($value)) {
                return $value;
            }

            $value = strip_tags($value);
            $value = preg_replace('/[\x00-\x1F\x7F]/', '', $value);

            return trim((string) $value);
        };

        $email = $this->input('email');
        if (is_string($email)) {
            $email = strtolower(trim($email)) ?: null;
        }

        $this->merge([
            'name' => $clean($this->input('name')),
            'phone' => $clean($this->input('phone')),
            'email' => $email,
            'from_location' => $clean($this->input('from_location')),
            'to_location' => $clean($this->input('to_location')),
            'time_slot' => $clean($this->input('time_slot')),
            'vehicle_type' => $clean($this->input('vehicle_type')),
            'website' => $clean($this->input('website')),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:32', 'regex:/^\+?[0-9\s().-]+$/'],
            'email' => ['nullable', 'email:rfc', 'max:255'],
            'from_location' => ['required', 'string', Rule::in(config('booking.locations'))],
            'to_location' => ['required', 'string', Rule::in(config('booking.locations')), 'different:from_location'],
            'travel_date' => ['required', 'date', 'after_or_equal:today'],
            'time_slot' => ['required', Rule::in(['Morning', 'Afternoon', 'Evening'])],
            'seats' => ['required', 'integer', 'min:1', 'max:60'],
            'vehicle_type' => ['nullable', 'string', 'max:100'],
            'website' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function after(): array
    {
        return [function (Validator $validator) {
            $phone = $this->input('phone');
            $digits = is_string($phone) ? preg_replace('/\D/', '', $phone) : '';
            if (strlen($digits) < 7 || strlen($digits) > 15) {
                $validator->errors()->add('phone', 'Enter a phone number with 7 to 15 digits.');
            }
        }];
    }

    public function messages(): array
    {
        return [
            'from_location.in' => 'Choose a valid departure city.',
            'to_location.in' => 'Choose a valid destination city.',
            'to_location.different' => 'Choose a destination different from your departure city.',
            'travel_date.after_or_equal' => 'Choose today or a future date.',
            'time_slot.in' => 'Choose Morning, Afternoon, or Evening.',
            'seats.max' => 'You can request a maximum of 60 seats.',
            'phone.regex' => 'Use digits and an optional international + sign, spaces, parentheses, or hyphens.',
        ];
    }

    protected function getRedirectUrl(): string
    {
        return url('/').'#booking';
    }
}
