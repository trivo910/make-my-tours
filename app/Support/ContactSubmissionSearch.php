<?php

namespace App\Support;

use App\Models\ContactSubmission;
use Illuminate\Database\Eloquent\Builder;

class ContactSubmissionSearch
{
    public function query(array $filters): Builder
    {
        return ContactSubmission::query()
            ->when($filters['search'] ?? null, function (Builder $query, string $search) {
                $term = '%'.$search.'%';
                $query->where(fn (Builder $nested) => $nested->where('name', 'like', $term)
                    ->orWhere('email', 'like', $term)
                    ->orWhere('phone', 'like', $term));
            })
            ->when($filters['date_from'] ?? null, fn (Builder $query, string $date) => $query->whereDate('created_at', '>=', $date))
            ->when($filters['date_to'] ?? null, fn (Builder $query, string $date) => $query->whereDate('created_at', '<=', $date))
            ->when($filters['read'] ?? null, fn (Builder $query, string $read) => $query->where('is_read', $read === 'read'))
            ->when($filters['email_status'] ?? null, fn (Builder $query, string $status) => $query->where('email_status', $status));
    }
}
