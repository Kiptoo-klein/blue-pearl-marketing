<?php

namespace Tests\Feature;

use Tests\TestCase;

class WebsiteSchemaTest extends TestCase
{
    public function test_homepage_has_website_structured_data(): void
    {
        $response = $this
            ->get(route('home'))
            ->assertOk();

        $response
            ->assertSee(
                '"@type":"WebSite"',
                false
            )
            ->assertSee(
                '"@id":"'.route('home').'#website"',
                false
            )
            ->assertSee(
                '"name":"'.config('seo.site_name').'"',
                false
            )
            ->assertSee(
                '"alternateName":"'.config('company.name').'"',
                false
            )
            ->assertSee(
                '"url":"'.route('home').'"',
                false
            )
            ->assertSee(
                '"publisher":{"@id":"'
                .route('home')
                .'#organization"}',
                false
            );
    }

    public function test_website_schema_is_only_on_homepage(): void
    {
        foreach ([
            'about',
            'services',
            'faq',
            'quote',
            'contact',
        ] as $routeName) {
            $this
                ->get(route($routeName))
                ->assertOk()
                ->assertDontSee(
                    '"@type":"WebSite"',
                    false
                );
        }
    }

    public function test_service_pages_do_not_duplicate_website_schema(): void
    {
        $this
            ->get(
                route(
                    'services.show',
                    'customs-clearance'
                )
            )
            ->assertOk()
            ->assertSee(
                '"@type":"Organization"',
                false
            )
            ->assertSee(
                '"@type":"Service"',
                false
            )
            ->assertDontSee(
                '"@type":"WebSite"',
                false
            );
    }
}
