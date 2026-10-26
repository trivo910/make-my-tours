@extends('admin.layouts.app')
@section('title', 'Booking Enquiries')
@section('content')
    <div class="page-heading">
        <div><span class="eyebrow">CUSTOMER ENQUIRIES</span><h1>Booking Enquiries</h1><p>Review trip requests and follow up with travellers.</p></div>
        <a href="{{ route('admin.booking-enquiries.export', request()->query()) }}" class="button-secondary">Export CSV <span>↓</span></a>
    </div>
    <section class="bento-grid contact-stats">
        <article class="bento-card contact-stat-card span-4"><div class="card-top"><span class="metric-icon violet">▤</span><span class="card-kicker">ALL TIME</span></div><p class="metric-value">{{ number_format($totalCount) }}</p><h2>Total bookings</h2></article>
        <article class="bento-card contact-stat-card span-4"><div class="card-top"><span class="metric-icon green">◉</span><span class="card-kicker">FOLLOW UP</span></div><p class="metric-value">{{ number_format($newCount) }}</p><h2>New enquiries</h2></article>
        <article class="bento-card contact-stat-card span-4"><div class="card-top"><span class="metric-icon amber">✉</span><span class="card-kicker">DELIVERY</span></div><p class="metric-value">{{ number_format($failedCount) }}</p><h2>Failed notifications</h2></article>
    </section>
    <section class="bento-card contact-table-card">
        <form class="contact-filters" method="get" action="{{ route('admin.booking-enquiries.index') }}">
            <label class="search-field"><span aria-hidden="true">⌕</span><input type="search" name="search" value="{{ $filters['search'] ?? '' }}" placeholder="Name or phone…" aria-label="Search booking enquiries"></label>
            <select name="status" aria-label="Filter by status"><option value="">All statuses</option>@foreach(['new'=>'New','contacted'=>'Contacted','confirmed'=>'Confirmed','cancelled'=>'Cancelled'] as $value=>$label)<option value="{{ $value }}" @selected(($filters['status'] ?? '') === $value)>{{ $label }}</option>@endforeach</select>
            <input type="date" name="date_from" value="{{ $filters['date_from'] ?? '' }}" aria-label="Travel date from">
            <input type="date" name="date_to" value="{{ $filters['date_to'] ?? '' }}" aria-label="Travel date to">
            <select name="from_location" aria-label="Filter by departure city"><option value="">All origins</option>@foreach($locations as $location)<option value="{{ $location }}" @selected(($filters['from_location'] ?? '') === $location)>{{ $location }}</option>@endforeach</select>
            <select name="to_location" aria-label="Filter by destination city"><option value="">All destinations</option>@foreach($locations as $location)<option value="{{ $location }}" @selected(($filters['to_location'] ?? '') === $location)>{{ $location }}</option>@endforeach</select>
            <button class="button-secondary filter-button" type="submit">Filter</button>
            @if($filters)<a class="clear-filter" href="{{ route('admin.booking-enquiries.index') }}">Clear</a>@endif
        </form>
        @if($enquiries->isEmpty())
            <div class="empty-state"><span class="empty-icon">✉</span><h2>{{ $filters ? 'No enquiries match those filters' : 'No booking enquiries yet' }}</h2><p>{{ $filters ? 'Adjust the search or filters and try again.' : 'New requests from the home page will appear here.' }}</p></div>
        @else
            <form id="booking-enquiries-bulk-form" action="{{ route('admin.booking-enquiries.bulk-destroy') }}" method="post">@csrf</form>
            <div class="table-scroll booking-table-scroll"><table class="blog-table booking-table"><thead><tr><th><input type="checkbox" data-select-all aria-label="Select all enquiries"></th><th>ID / NAME</th><th>PHONE</th><th>ROUTE</th><th>DATE</th><th>TIME</th><th>SEATS</th><th>STATUS</th><th>EMAIL</th><th>CREATED</th><th><span class="sr-only">Actions</span></th></tr></thead><tbody>
                @foreach($enquiries as $enquiry)
                    <tr>
                        <td><input type="checkbox" form="booking-enquiries-bulk-form" name="booking_enquiry_ids[]" value="{{ $enquiry->id }}" aria-label="Select enquiry {{ $enquiry->id }}"></td>
                        <td><a class="booking-visitor-cell" href="{{ route('admin.booking-enquiries.show', $enquiry) }}"><strong>#{{ $enquiry->id }} · {{ $enquiry->name }}</strong><small>{{ $enquiry->email ?: 'No email provided' }}</small></a></td>
                        <td><a href="tel:{{ preg_replace('/[^+0-9]/', '', $enquiry->phone) }}">{{ $enquiry->phone }}</a></td>
                        <td>{{ $enquiry->from_location }} → {{ $enquiry->to_location }}</td>
                        <td>{{ $enquiry->travel_date->format('M j, Y') }}</td>
                        <td>{{ $enquiry->time_slot }}</td>
                        <td>{{ $enquiry->seats }}</td>
                        <td><span class="status-pill booking-status-{{ $enquiry->status }}">{{ ucfirst($enquiry->status) }}</span></td>
                        <td><span class="status-pill {{ $enquiry->email_status === 'failed' ? 'status-draft' : ($enquiry->email_status === 'sent' ? 'status-published' : 'status-scheduled') }}">{{ ucfirst($enquiry->email_status) }}</span></td>
                        <td>{{ $enquiry->created_at->format('M j, Y') }}</td>
                        <td><div class="row-actions"><a class="table-action" href="{{ route('admin.booking-enquiries.show', $enquiry) }}" aria-label="View enquiry {{ $enquiry->id }}">↗</a><form action="{{ route('admin.booking-enquiries.destroy', $enquiry) }}" method="post" onsubmit="return confirm('Delete this booking enquiry permanently?')">@csrf @method('delete')<button class="table-action danger-action" type="submit" aria-label="Delete enquiry {{ $enquiry->id }}">×</button></form></div></td>
                    </tr>
                @endforeach
            </tbody></table></div>
            <div class="table-footer"><button class="button-secondary danger-button" type="submit" form="booking-enquiries-bulk-form" onclick="return confirm('Delete all selected booking enquiries permanently?')">Delete selected</button>{{ $enquiries->onEachSide(1)->links('pagination::simple-tailwind') }}</div>
        @endif
    </section>
@endsection
