<!doctype html>
<html lang="en"><body style="margin:0;padding:28px;background:#f5f6f8;color:#182230;font-family:Arial,sans-serif;line-height:1.6">
    <div style="max-width:640px;margin:0 auto;padding:28px;border:1px solid #e7eaf0;border-radius:18px;background:#fff">
        <p style="margin:0;color:#6758d9;font-size:11px;font-weight:bold;letter-spacing:1.5px">MAKE MY TOURS &amp; TRAVELS</p>
        <h1 style="margin:10px 0 5px;font-size:23px">New website enquiry</h1>
        <p style="margin:0 0 22px;color:#778292;font-size:13px">A visitor sent a message through the contact form. Reply directly to this email to reach them.</p>
        <table role="presentation" style="width:100%;border-collapse:collapse;font-size:13px">
            <tr><th align="left" style="width:130px;padding:10px;border-bottom:1px solid #e7eaf0;color:#778292">Name</th><td style="padding:10px;border-bottom:1px solid #e7eaf0">{{ $submission->name }}</td></tr>
            <tr><th align="left" style="padding:10px;border-bottom:1px solid #e7eaf0;color:#778292">Email</th><td style="padding:10px;border-bottom:1px solid #e7eaf0"><a href="mailto:{{ $submission->email }}">{{ $submission->email }}</a></td></tr>
            <tr><th align="left" style="padding:10px;border-bottom:1px solid #e7eaf0;color:#778292">Phone</th><td style="padding:10px;border-bottom:1px solid #e7eaf0">{{ $submission->phone }}</td></tr>
            <tr><th align="left" style="padding:10px;border-bottom:1px solid #e7eaf0;color:#778292">Address</th><td style="padding:10px;border-bottom:1px solid #e7eaf0">{{ $submission->address }}</td></tr>
            <tr><th align="left" valign="top" style="padding:10px;color:#778292">Message</th><td style="padding:10px;white-space:pre-wrap">{{ $submission->message }}</td></tr>
        </table>
        <p style="margin:24px 0 0;color:#778292;font-size:11px">Submission #{{ $submission->id }} · {{ $submission->created_at->format('F j, Y g:i A') }}</p>
    </div>
</body></html>
