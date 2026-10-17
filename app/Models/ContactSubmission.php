<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'message', 'ip_address', 'user_agent',
        'is_read', 'email_status', 'email_error',
    ];

    protected function casts(): array
    {
        return ['is_read' => 'boolean'];
    }

    public function scopeUnread(Builder $query): Builder
    {
        return $query->where('is_read', false);
    }
}
