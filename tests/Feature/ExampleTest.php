<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_homepage_displays_its_main_sections(): void
    {
        $response = $this->get('/');

        $response->assertOk()
            ->assertSeeText('Your Trusted Travel Partner Since 2008')
            ->assertSeeText('Explore Our Travel Services')
            ->assertSeeText('Our Bus Collection')
            ->assertSee('aria-label="Travel date" min="' . now()->toDateString() . '"', false)
            ->assertSee('images/bd-explorations-1.png')
            ->assertSee('class="site-header"', false)
            ->assertSee('class="site-footer"', false);
    }
}
