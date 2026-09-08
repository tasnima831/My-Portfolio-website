<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_public_pages_have_canonical_metadata_and_valid_structured_data(): void
    {
        config(['app.url' => 'https://portfolio.example']);
        $paths = ['/', '/about-me'];
        foreach (config('portfolio.projects') as $project) {
            $paths[] = '/projects/'.$project['slug'];
        }
        $titles = [];
        foreach ($paths as $path) {
            $response = $this->get($path.'?utm_source=test')->assertOk();
            $response->assertSee('<link rel="canonical" href="https://portfolio.example'.$path.'">', false)
                ->assertSee('<meta name="description" content="', false)
                ->assertSee('<meta property="og:url" content="https://portfolio.example'.$path.'">', false);
            preg_match('/<title>(.*?)<\/title>/s', $response->getContent(), $title);
            $titles[] = $title[1];
            preg_match('/<script type="application\/ld\+json">(.*?)<\/script>/s', $response->getContent(), $match);
            $data = json_decode($match[1], true, 512, JSON_THROW_ON_ERROR);
            $this->assertSame('https://schema.org', $data['@context']);
            $this->assertSame('https://portfolio.example'.$path, end($data['@graph'])['url']);
        }
        $this->assertCount(count($paths), array_unique($titles));
    }

    public function test_sitemap_and_robots_use_the_configured_public_domain(): void
    {
        config(['app.url' => 'https://portfolio.example']);
        $response = $this->get('/sitemap.xml')->assertOk()
            ->assertHeader('Content-Type', 'application/xml; charset=UTF-8');
        $xml = simplexml_load_string($response->getContent());
        $this->assertNotFalse($xml);
        $this->assertCount(2 + count(config('portfolio.projects')), $xml->url);
        foreach (config('portfolio.projects') as $project) {
            $response->assertSee('https://portfolio.example/projects/'.$project['slug']);
        }
        $this->get('/robots.txt')->assertOk()
            ->assertSee('Sitemap: https://portfolio.example/sitemap.xml');
        $this->get('/projects/does-not-exist')->assertNotFound();
    }
}
