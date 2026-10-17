<?php

namespace Tests\Feature;

use Tests\TestCase;

class AboutPageTest extends TestCase
{
    public function test_the_about_page_displays_its_company_story_and_local_images(): void
    {
        $response = $this->get('/about');

        $response->assertOk()
            ->assertSeeText('Make My Tours & Travels – Trusted AC Bus, Non-AC Bus & Tempo Traveller Rental in Mumbai')
            ->assertSeeText('Since 2008, Make My Tours & Travels has been a trusted name in Mumbai')
            ->assertSee('images/bd-explorations-1.png')
            ->assertSee('class="site-header"', false)
            ->assertSee('class="site-footer"', false);
    }
}
