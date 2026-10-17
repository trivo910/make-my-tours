<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class StoreContactSubmissionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $clean = function (?string $value, bool $preserveLines = false): string {
            $value = strip_tags($value ?? '');
            $pattern = $preserveLines ? '/[\x00-\x08\x0B\x0C\x0E-\x1F\x7F]/' : '/[\x00-\x1F\x7F]/';
            return trim((string) preg_replace($pattern, '', $value));
        };

        $this->merge([
            'name' => $clean($this->input('name')),
            'email' => strtolower(trim((string) $this->input('email'))),
            'phone' => $clean($this->input('phone')),
            'address' => $clean($this->input('address')),
            'message' => $clean($this->input('message'), true),
            'website' => trim((string) $this->input('website')),
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['required', 'string', 'max:32', 'regex:/^\+?[0-9\s().-]+$/'],
            'address' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:3000'],
            'website' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function after(): array
    {
        return [function (Validator $validator) {
            $digits = preg_replace('/\D/', '', (string) $this->input('phone'));
            if (strlen($digits) < 7 || strlen($digits) > 15) {
                $validator->errors()->add('phone', 'Enter a phone number with 7 to 15 digits.');
            }
        }];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Use digits and an optional international + sign, spaces, parentheses, or hyphens.',
            'message.min' => 'Please enter at least 10 characters so we can help you properly.',
        ];
    }
}
