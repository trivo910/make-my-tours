<?php

namespace Tests\Feature;

use Tests\TestCase;

class TempoTravellerHirePageTest extends TestCase
{
    public function test_the_tempo_traveller_hire_page_is_available(): void
    {
        $response = $this->get('/tempo-traveller-hire');

        $response->assertOk()
            ->assertSeeText('Tempo Traveller Hire – Make My Tours & Travels')
            ->assertViewIs('pages.tempo-traveller-hire')
            ->assertSee('class="site-header"', false)
            ->assertSee('class="site-footer"', false)
            ->assertSee('href="' . route('blog.index') . '"', false);
    }
}
