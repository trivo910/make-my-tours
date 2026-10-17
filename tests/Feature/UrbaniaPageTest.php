<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrbaniaPageTest extends TestCase
{
    public function test_the_urbania_page_is_available_from_the_header_submenu(): void
    {
        $this->get('/urbania')
            ->assertOk()
            ->assertSee('css/pages/urbania.css')
            ->assertSee('href="' . url('/urbania') . '"', false)
            ->assertSee('aria-current="page"', false)
            ->assertSee('class="site-header"', false)
            ->assertSee('class="site-footer"', false);
    }
}
