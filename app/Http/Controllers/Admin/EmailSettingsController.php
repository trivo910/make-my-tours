<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SmtpTestMail;
use App\Models\EmailLog;
use App\Models\Setting;
use App\Support\EmailConfiguration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Throwable;

class EmailSettingsController extends Controller
{
    public function edit(): View
    {
        $settings = EmailConfiguration::values();
        return view('admin.settings.email', [
            'settings' => $settings,
            'passwordSaved' => ! empty($settings['mail_password']),
            'lastTest' => EmailLog::latest()->first(),
            'logs' => EmailLog::latest()->take(8)->get(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'host' => ['required', 'string', 'max:255', 'regex:/^[A-Za-z0-9.:-]+$/'],
            'port' => ['required', 'integer', 'between:1,65535'],
            'encryption' => ['required', Rule::in(['tls', 'ssl', 'none'])],
            'username' => ['nullable', 'string', 'max:255'],
            'password' => ['nullable', 'string', 'max:4096'],
            'from_address' => ['required', 'email', 'max:255'],
            'from_name' => ['required', 'string', 'max:255'],
            'company_notification_email' => ['required', 'email', 'max:255'],
            'cc' => ['nullable', 'email', 'max:255'],
            'bcc' => ['nullable', 'email', 'max:255'],
            'contact_auto_reply_enabled' => ['nullable', 'boolean'],
        ]);

        $values = [
            'mail_host' => $data['host'],
            'mail_port' => (string) $data['port'],
            'mail_encryption' => $data['encryption'],
            'mail_username' => $data['username'] ?? '',
            'mail_from_address' => $data['from_address'],
            'mail_from_name' => $data['from_name'],
            'company_notification_email' => $data['company_notification_email'],
            'mail_cc' => $data['cc'] ?? '',
            'mail_bcc' => $data['bcc'] ?? '',
            'contact_auto_reply_enabled' => $request->boolean('contact_auto_reply_enabled') ? '1' : '0',
        ];
        if (! empty($data['password'])) $values['mail_password'] = Crypt::encryptString($data['password']);

        foreach ($values as $key => $value) Setting::updateOrCreate(['key' => $key], ['value' => $value]);

        return redirect()->route('admin.settings.email.edit')->with('status', 'Email settings saved. The saved SMTP settings will be used for email delivery.');
    }

    public function sendTest(Request $request): RedirectResponse
    {
        $data = $request->validate(['recipient' => ['required', 'email', 'max:255']]);
        $settings = EmailConfiguration::values();
        if (empty($settings['mail_host']) || empty($settings['mail_from_address'])) {
            return back()->withErrors(['recipient' => 'Save the SMTP host and sender address before sending a test.'])->withInput();
        }

        $recipient = $data['recipient'];
        try {
            EmailConfiguration::apply();
            $mail = Mail::mailer('smtp')->to($recipient);
            if (! empty($settings['mail_cc'])) $mail->cc($settings['mail_cc']);
            if (! empty($settings['mail_bcc'])) $mail->bcc($settings['mail_bcc']);
            $mail->send(new SmtpTestMail());

            EmailLog::create(['recipient' => $recipient, 'result' => 'success', 'message' => 'Test email delivered successfully.']);
            return back()->with('test_result', ['type' => 'success', 'message' => 'Test email sent successfully to '.$recipient.'.']);
        } catch (Throwable $exception) {
            $error = trim($exception->getMessage()) ?: 'The mail server returned an unspecified error.';
            $error = mb_substr($error, 0, 4000);
            try {
                EmailLog::create(['recipient' => $recipient, 'result' => 'failed', 'message' => $error]);
            } catch (Throwable $logException) {
                report($logException);
            }
            report($exception);
            return back()->with('test_result', ['type' => 'failed', 'message' => $error]);
        }
    }
}
