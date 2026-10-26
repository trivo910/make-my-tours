<?php

namespace App\Support;

use App\Models\BookingEnquiry;
use Illuminate\Database\Eloquent\Builder;

class BookingEnquirySearch
{
    public function query(array $filters): Builder
    {
        return BookingEnquiry::query()
            ->when($filters['search'] ?? null, function (Builder $query, string $search) {
                $term = '%'.$search.'%';
                $query->where(fn (Builder $nested) => $nested
                    ->where('name', 'like', $term)
                    ->orWhere('phone', 'like', $term));
            })
            ->when($filters['status'] ?? null, fn (Builder $query, string $status) => $query->where('status', $status))
            ->when($filters['date_from'] ?? null, fn (Builder $query, string $date) => $query->whereDate('travel_date', '>=', $date))
            ->when($filters['date_to'] ?? null, fn (Builder $query, string $date) => $query->whereDate('travel_date', '<=', $date))
            ->when($filters['from_location'] ?? null, fn (Builder $query, string $location) => $query->where('from_location', $location))
            ->when($filters['to_location'] ?? null, fn (Builder $query, string $location) => $query->where('to_location', $location));
    }
}
