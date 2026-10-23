<?php

namespace Tests\Feature;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogVisibilityTest extends TestCase
{
    use RefreshDatabase;

    public function test_published_post_is_visible_when_its_local_publication_time_is_due(): void
    {
        $this->assertSame('Asia/Kolkata', config('app.timezone'));

        BlogPost::create([
            'title' => 'A published travel story',
            'slug' => 'published-travel-story',
            'content' => '<p>Travel details</p>',
            'status' => 'published',
            'published_at' => now()->subMinute(),
        ]);

        $this->get(route('blog.index'))
            ->assertOk()
            ->assertSee('A published travel story');

        $this->get(route('blog.show', 'published-travel-story'))
            ->assertOk()
            ->assertSee('property="og:type" content="article"', false)
            ->assertSee('property="og:title" content="A published travel story', false)
            ->assertSee('property="og:url" content="' . route('blog.show', 'published-travel-story') . '"', false)
            ->assertSee('"@type":"BlogPosting"', false)
            ->assertSee('application/ld+json');
    }

    public function test_future_scheduled_post_is_not_visible_yet(): void
    {
        BlogPost::create([
            'title' => 'A scheduled travel story',
            'slug' => 'scheduled-travel-story',
            'content' => '<p>Travel details</p>',
            'status' => 'published',
            'published_at' => now()->addDay(),
        ]);

        $this->get(route('blog.index'))
            ->assertOk()
            ->assertDontSee('A scheduled travel story');
    }
}
