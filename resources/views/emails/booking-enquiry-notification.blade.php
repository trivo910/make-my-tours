<!doctype html>
<html lang="en"><body>
    <main>
        <p>MAKE MY TOURS &amp; TRAVELS</p>
        <h1>New booking enquiry</h1>
        <p>A visitor requested a booking. Contact the traveller using the details below.</p>
        <table>
            <tr><th align="left">Name</th><td>{{ $enquiry->name }}</td></tr>
            <tr><th align="left">Phone</th><td>{{ $enquiry->phone }}</td></tr>
            @if($enquiry->email)<tr><th align="left">Email</th><td><a href="mailto:{{ $enquiry->email }}">{{ $enquiry->email }}</a></td></tr>@endif
            <tr><th align="left">From</th><td>{{ $enquiry->from_location }}</td></tr>
            <tr><th align="left">To</th><td>{{ $enquiry->to_location }}</td></tr>
            <tr><th align="left">When</th><td>{{ $enquiry->travel_date->format('M j, Y') }} · {{ $enquiry->time_slot }}</td></tr>
            <tr><th align="left">Seats</th><td>{{ $enquiry->seats }}</td></tr>
            @if($enquiry->vehicle_type)<tr><th align="left">Vehicle</th><td>{{ $enquiry->vehicle_type }}</td></tr>@endif
        </table>
        <p><a href="{{ $enquiry->whatsappUrl() }}">Message {{ $enquiry->name }} on WhatsApp</a></p>
        <p>Enquiry #{{ $enquiry->id }} · {{ $enquiry->created_at->format('F j, Y g:i A') }}</p>
    </main>
</body></html>
