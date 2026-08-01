<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServicePagesTest extends TestCase
{
    public function test_each_service_page_is_available(): void
    {
        $services = collect(config('services'))
            ->filter(
                fn (mixed $details): bool => is_array($details)
                    && isset($details['name'])
            )
            ->keys();

        foreach ($services as $service) {
            $this
                ->get(route('services.show', $service))
                ->assertOk()
                ->assertSee(config("services.{$service}.name"));
        }
    }

    public function test_unknown_service_returns_not_found(): void
    {
        $this
            ->get(route('services.show', 'unknown-service'))
            ->assertNotFound();
    }

    public function test_faq_page_is_available(): void
    {
        $this
            ->get(route('faq'))
            ->assertOk()
            ->assertSee('Frequently asked questions');
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

    public function test_sitemap_and_robots_are_available(): void
    {
        $this
            ->get(route('sitemap'))
            ->assertOk()
            ->assertHeader(
                'Content-Type',
                'application/xml'
            )
            ->assertSee(route('home'), false);

        $this
            ->get(route('robots'))
            ->assertOk()
            ->assertSee('User-agent: *')
            ->assertSee(route('sitemap'));
    }
}
