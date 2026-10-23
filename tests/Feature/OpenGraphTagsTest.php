<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OpenGraphTagsTest extends TestCase
{
    use RefreshDatabase;

    public function test_each_public_page_has_page_specific_open_graph_and_twitter_metadata(): void
    {
        $paths = [
            '/',
            '/about',
            '/contact',
            '/faqs',
            '/bus-hire',
            '/tempo-traveller-hire',
            '/urbania',
            '/blog',
        ];
        $titles = [];

        foreach ($paths as $path) {
            $response = $this->get($path)->assertOk();
            $html = $response->getContent();

            preg_match_all('/<meta property="og:title" content="([^"]+)"/', $html, $matches);
            $this->assertCount(1, $matches[1], "Expected one Open Graph title on {$path}.");
            $this->assertNotEmpty($matches[1][0], "Expected a page-specific Open Graph title on {$path}.");
            $this->assertStringContainsString('property="og:description" content="', $html);
            $this->assertStringContainsString('property="og:url" content="' . url($path) . '"', $html);
            $this->assertStringContainsString('property="og:image" content="', $html);
            $this->assertStringContainsString('name="twitter:card" content="summary_large_image"', $html);
            $titles[] = $matches[1][0];
        }

        $this->assertCount(count($paths), array_unique($titles), 'Each public page should have its own Open Graph title.');
    }
}
