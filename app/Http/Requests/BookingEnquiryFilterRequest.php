<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingEnquiryFilterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:255'],
            'status' => ['nullable', Rule::in(['new', 'contacted', 'confirmed', 'cancelled'])],
            'date_from' => ['nullable', 'date_format:Y-m-d'],
            'date_to' => ['nullable', 'date_format:Y-m-d', function (string $attribute, mixed $value, $fail) {
                if ($value && $this->filled('date_from') && $value < $this->input('date_from')) {
                    $fail('The end date must be on or after the start date.');
                }
            }],
            'from_location' => ['nullable', Rule::in(config('booking.locations'))],
            'to_location' => ['nullable', Rule::in(config('booking.locations'))],
        ];
    }
}
