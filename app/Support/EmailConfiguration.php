<?php

namespace App\Support;

use App\Models\Setting;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Schema;
use Throwable;

class EmailConfiguration
{
    public static function values(): array
    {
        if (! Schema::hasTable('settings')) return [];
        return Setting::query()->whereIn('key', [
            'mail_host', 'mail_port', 'mail_encryption', 'mail_username', 'mail_password',
            'mail_from_address', 'mail_from_name', 'company_notification_email', 'mail_cc', 'mail_bcc',
        ])->pluck('value', 'key')->all();
    }

    public static function apply(): void
    {
        try {
            $settings = self::values();
            if (empty($settings['mail_host']) || empty($settings['mail_from_address'])) return;

            $encryption = $settings['mail_encryption'] ?? 'tls';
            $scheme = match ($encryption) {
                'ssl' => 'smtps',
                default => 'smtp',
            };
            $options = [
                'transport' => 'smtp',
                'scheme' => $scheme,
                'host' => $settings['mail_host'],
                'port' => (int) ($settings['mail_port'] ?? 587),
                'username' => $settings['mail_username'] ?: null,
                'password' => self::decryptPassword($settings['mail_password'] ?? null),
                'timeout' => 15,
                'auto_tls' => $encryption !== 'none',
                'require_tls' => $encryption === 'tls',
            ];

            config([
                'mail.default' => 'smtp',
                'mail.mailers.smtp' => $options,
                'mail.from.address' => $settings['mail_from_address'],
                'mail.from.name' => $settings['mail_from_name'] ?: config('app.name'),
            ]);
        } catch (Throwable $exception) {
            report($exception);
        }
    }

    public static function decryptPassword(?string $encrypted): ?string
    {
        if (! $encrypted) return null;
        try {
            return Crypt::decryptString($encrypted);
        } catch (Throwable $exception) {
            report($exception);
            return null;
        }
    }
}
