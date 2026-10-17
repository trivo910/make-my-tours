<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('blog_post_slug_histories') && ! Schema::hasTable('blog_slug_redirects')) {
            Schema::rename('blog_post_slug_histories', 'blog_slug_redirects');
        }

        if (Schema::hasTable('blog_posts') && ! Schema::hasColumn('blog_posts', 'deleted_at')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        Schema::create('contact_submissions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email');
            $table->string('phone', 32);
            $table->string('address', 255);
            $table->text('message');
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->boolean('is_read')->default(false)->index();
            $table->string('email_status', 20)->default('pending')->index();
            $table->text('email_error')->nullable();
            $table->timestamps();

            $table->index(['created_at', 'is_read']);
            $table->index(['created_at', 'email_status']);
            $table->index(['email', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_submissions');

        if (Schema::hasTable('blog_posts') && Schema::hasColumn('blog_posts', 'deleted_at')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                $table->dropSoftDeletes();
            });
        }

        if (Schema::hasTable('blog_slug_redirects') && ! Schema::hasTable('blog_post_slug_histories')) {
            Schema::rename('blog_slug_redirects', 'blog_post_slug_histories');
        }
    }
};
