<?php

namespace Tests\Feature;

use Tests\TestCase;

class FaqsPageTest extends TestCase
{
    public function test_the_faqs_page_is_available_from_the_header_menu(): void
    {
        $this->get('/faqs')
            ->assertOk()
            ->assertSeeText('Find answers to common questions')
            ->assertSee('href="' . url('/faqs') . '"', false)
            ->assertSee('aria-current="page"', false)
            ->assertSee('class="site-header"', false);
    }
}
