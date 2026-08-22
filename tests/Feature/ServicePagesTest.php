<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServicePagesTest extends TestCase
{
    public function test_each_service_page_is_available(): void
    {
        $services = collect(config('services'))
            ->filter(
                fn (mixed $details): bool =>
                    is_array($details)
                    && isset(
                        $details['name'],
                        $details['summary']
                    )
            )
            ->keys();

        foreach ($services as $service) {
            $this
                ->get(route('services.show', $service))
                ->assertOk()
                ->assertSee(
                    config("services.{$service}.name")
                );
        }
    }

    public function test_unknown_service_returns_not_found(): void
    {
        $this
            ->get(route(
                'services.show',
                'unknown-service'
            ))
            ->assertNotFound();
    }

    public function test_faq_page_is_available(): void
    {
        $this
            ->get(route('faq'))
            ->assertOk()
            ->assertSee(
                'Frequently asked questions'
            );
    }

    public function test_quote_page_can_preselect_a_service(): void
    {
        $this
            ->get(route('quote', [
                'service' => 'vehicle-importation',
            ]))
            ->assertOk()
            ->assertSee(
                'value="vehicle-importation"',
                false
            )
            ->assertSee(
                'selected',
                false
            );
    }

    public function test_sitemap_contains_public_pages_and_real_services(): void
    {
        $response = $this
            ->get(route('sitemap'))
            ->assertOk()
            ->assertHeader(
                'Content-Type',
                'application/xml'
            );

        $response
            ->assertSee(
                route('home'),
                false
            )
            ->assertSee(
                route('about'),
                false
            )
            ->assertSee(
                route('services'),
                false
            )
            ->assertSee(
                route('faq'),
                false
            )
            ->assertSee(
                route('quote'),
                false
            )
            ->assertSee(
                route('contact'),
                false
            );

        $services = collect(config('services'))
            ->filter(
                fn (mixed $details): bool =>
                    is_array($details)
                    && isset(
                        $details['name'],
                        $details['summary']
                    )
            )
            ->keys();

        foreach ($services as $service) {
            $response->assertSee(
                route(
                    'services.show',
                    $service
                ),
                false
            );
        }
    }

    public function test_sitemap_excludes_laravel_service_integrations(): void
    {
        $this
            ->get(route('sitemap'))
            ->assertOk()
            ->assertDontSee(
                '/services/postmark',
                false
            )
            ->assertDontSee(
                '/services/resend',
                false
            )
            ->assertDontSee(
                '/services/ses',
                false
            )
            ->assertDontSee(
                '/services/slack',
                false
            );
    }

    public function test_robots_blocks_crawlers_when_indexing_is_disabled(): void
    {
        config([
            'seo.indexing_enabled' => false,
        ]);

        $this
            ->get(route('robots'))
            ->assertOk()
            ->assertHeader(
                'Content-Type',
                'text/plain; charset=UTF-8'
            )
            ->assertSee(
                'User-agent: *',
                false
            )
            ->assertSee(
                'Disallow: /',
                false
            )
            ->assertDontSee(
                'Allow: /',
                false
            );
    }

    public function test_robots_allows_crawlers_when_indexing_is_enabled(): void
    {
        config([
            'seo.indexing_enabled' => true,
        ]);

        $this
            ->get(route('robots'))
            ->assertOk()
            ->assertSee(
                'User-agent: *',
                false
            )
            ->assertSee(
                'Allow: /',
                false
            )
            ->assertSee(
                'Sitemap: '.route('sitemap'),
                false
            )
            ->assertDontSee(
                'Disallow: /',
                false
            );
    }

    public function test_html_pages_are_noindex_when_indexing_is_disabled(): void
    {
        config([
            'seo.indexing_enabled' => false,
        ]);

        $this
            ->get(route('home'))
            ->assertOk()
            ->assertSee(
                'name="robots"',
                false
            )
            ->assertSee(
                'content="noindex, nofollow"',
                false
            );
    }

    public function test_html_pages_are_indexable_when_indexing_is_enabled(): void
    {
        config([
            'seo.indexing_enabled' => true,
        ]);

        $this
            ->get(route('home'))
            ->assertOk()
            ->assertSee(
                'name="robots"',
                false
            )
            ->assertSee(
                'content="index, follow"',
                false
            );
    }

    public function test_static_robots_file_does_not_override_dynamic_route(): void
    {
        $this->assertFileDoesNotExist(
            public_path('robots.txt')
        );
    }
}
