<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactSubmissionFilterRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'search' => ['nullable', 'string', 'max:255'],
            'date_from' => ['nullable', 'date_format:Y-m-d'],
            'date_to' => ['nullable', 'date_format:Y-m-d', function (string $attribute, mixed $value, $fail) {
                if ($value && $this->filled('date_from') && $value < $this->input('date_from')) {
                    $fail('The end date must be on or after the start date.');
                }
            }],
            'read' => ['nullable', Rule::in(['read', 'unread'])],
            'email_status' => ['nullable', Rule::in(['pending', 'sent', 'failed'])],
        ];
    }
}
