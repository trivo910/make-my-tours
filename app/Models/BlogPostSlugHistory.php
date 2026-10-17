<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlogPostSlugHistory extends Model
{
    protected $fillable = ['post_id', 'old_slug'];

    public function post(): BelongsTo { return $this->belongsTo(BlogPost::class); }
}
