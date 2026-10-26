@extends('admin.layouts.app')
@section('title', 'Booking enquiry #'.$enquiry->id)
@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">BOOKING ENQUIRY · #{{ $enquiry->id }}</span><h1>{{ $enquiry->name }}</h1><p>Received {{ $enquiry->created_at->format('F j, Y · g:i A') }}</p></div>
        <a class="button-secondary" href="{{ route('admin.booking-enquiries.index') }}">← All booking enquiries</a>
    </div>
    <div class="submission-detail-grid booking-detail-grid">
        <section class="bento-card visitor-card">
            <div class="visitor-heading"><span class="large-avatar">{{ mb_substr($enquiry->name, 0, 1) }}</span><div><span class="eyebrow">TRAVELLER</span><h2>{{ $enquiry->name }}</h2></div></div>
            <dl class="visitor-details">
                <div><dt>Phone number</dt><dd><a href="tel:{{ preg_replace('/[^+0-9]/', '', $enquiry->phone) }}">{{ $enquiry->phone }}</a></dd></div>
                <div><dt>Email address</dt><dd>@if($enquiry->email)<a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a>@else Not provided @endif</dd></div>
                <div><dt>WhatsApp</dt><dd><a href="{{ $enquiry->whatsappUrl() }}" target="_blank" rel="noopener">Message traveller ↗</a></dd></div>
            </dl>
        </section>
        <section class="bento-card message-detail-card">
            <div class="section-heading"><div><span class="eyebrow">TRIP DETAILS</span><h2>{{ $enquiry->from_location }} → {{ $enquiry->to_location }}</h2></div><span class="submission-date-pill">{{ $enquiry->travel_date->format('M j') }}</span></div>
            <div class="booking-trip-details">
                <div><span>Travel date</span><strong>{{ $enquiry->travel_date->format('F j, Y') }}</strong></div>
                <div><span>Time</span><strong>{{ $enquiry->time_slot }}</strong></div>
                <div><span>Seats</span><strong>{{ $enquiry->seats }}</strong></div>
                <div><span>Vehicle</span><strong>{{ $enquiry->vehicle_type ?: 'Not specified' }}</strong></div>
            </div>
        </section>
        <section class="bento-card delivery-detail-card">
            <div class="section-heading"><div><span class="eyebrow">FOLLOW UP</span><h2>Enquiry status</h2></div><span class="status-pill booking-status-{{ $enquiry->status }}">{{ ucfirst($enquiry->status) }}</span></div>
            <form class="booking-status-form" action="{{ route('admin.booking-enquiries.update-status', $enquiry) }}" method="post">@csrf @method('patch')<label for="booking-status">Update status</label><select id="booking-status" name="status">@foreach($statuses as $status)<option value="{{ $status }}" @selected($enquiry->status === $status)>{{ ucfirst($status) }}</option>@endforeach</select><button class="button-secondary" type="submit">Save status</button></form>
            <div class="section-heading booking-email-heading"><div><span class="eyebrow">NOTIFICATION</span><h2>Email delivery</h2></div><span class="status-pill {{ $enquiry->email_status === 'sent' ? 'status-published' : ($enquiry->email_status === 'failed' ? 'status-draft' : 'status-scheduled') }}">{{ ucfirst($enquiry->email_status) }}</span></div>
            @if($enquiry->email_status === 'failed')<div class="delivery-error"><strong>Delivery failed</strong><p>{{ $enquiry->email_error ?: 'No error details were returned.' }}</p></div>@elseif($enquiry->email_status === 'pending')<p class="delivery-description">The notification is waiting in the email queue.</p>@else<p class="delivery-description">The company notification was sent successfully.</p>@endif
            <form action="{{ route('admin.booking-enquiries.resend', $enquiry) }}" method="post">@csrf<button class="button-secondary" type="submit">↻ Resend notification</button></form>
        </section>
        <section class="bento-card visitor-tech-card">
            <span class="eyebrow">SUBMISSION DETAILS</span>
            <div class="tech-detail"><strong>IP address</strong><span>{{ $enquiry->ip ?: 'Not available' }}</span></div>
            <div class="tech-detail"><strong>Browser / device</strong><span>{{ $enquiry->user_agent ?: 'Not available' }}</span></div>
            <div class="tech-detail"><strong>Enquiry ID</strong><span>#{{ $enquiry->id }}</span></div>
            <div class="tech-detail"><strong>Received</strong><span>{{ $enquiry->created_at->format('M j, Y g:i A') }}</span></div>
        </section>
        <section class="detail-danger-zone"><form action="{{ route('admin.booking-enquiries.destroy', $enquiry) }}" method="post" onsubmit="return confirm('Delete this booking enquiry permanently?')">@csrf @method('delete')<button class="button-secondary danger-button" type="submit">Delete enquiry</button></form></section>
    </div>
@endsection
