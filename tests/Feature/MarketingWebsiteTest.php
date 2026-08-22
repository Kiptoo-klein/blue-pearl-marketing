<?php

namespace Tests\Feature;

use Tests\TestCase;

class MarketingWebsiteTest extends TestCase
{
    public function test_homepage_is_available(): void
    {
        $this
            ->get(route('home'))
            ->assertOk()
            ->assertSee('Clear cargo faster')
            ->assertSee('Request a Quote');
    }

    public function test_public_pages_are_available(): void
    {
        $this->get(route('about'))->assertOk();
        $this->get(route('services'))->assertOk();
        $this->get(route('quote'))->assertOk();
        $this->get(route('contact'))->assertOk();
    }

    public function test_homepage_has_core_seo_metadata(): void
    {
        $seo = config('seo.pages.home');

        $expectedTitle = $seo['title']
            .' | '
            .config('seo.site_name');

        $response = $this
            ->get(route('home'))
            ->assertOk();

        $response
            ->assertSee(
                $expectedTitle
            )
            ->assertSee(
                $seo['description'],
                false
            )
            ->assertSee(
                'name="description"',
                false
            )
            ->assertSee(
                'rel="canonical"',
                false
            )
            ->assertSee(
                'href="'.route('home').'"',
                false
            )
            ->assertSee(
                'property="og:type"',
                false
            )
            ->assertSee(
                'property="og:locale"',
                false
            )
            ->assertSee(
                'content="en_KE"',
                false
            )
            ->assertSee(
                'property="og:site_name"',
                false
            )
            ->assertSee(
                'property="og:title"',
                false
            )
            ->assertSee(
                'property="og:description"',
                false
            )
            ->assertSee(
                'property="og:url"',
                false
            )
            ->assertSee(
                'name="twitter:card"',
                false
            )
            ->assertSee(
                'name="twitter:title"',
                false
            )
            ->assertSee(
                'name="twitter:description"',
                false
            );
    }

    public function test_static_pages_use_route_specific_seo_metadata(): void
    {
        foreach ([
            'home',
            'about',
            'services',
            'faq',
            'quote',
            'contact',
        ] as $routeName) {
            $seo = config(
                "seo.pages.{$routeName}"
            );

            $expectedTitle = $seo['title']
                .' | '
                .config('seo.site_name');

            $this
                ->get(route($routeName))
                ->assertOk()
                ->assertSee(
                    $expectedTitle
                )
                ->assertSee(
                    $seo['description'],
                    false
                );
        }
    }

    public function test_service_page_has_dynamic_seo_metadata(): void
    {
        $service = 'customs-clearance';

        $details = config(
            "services.{$service}"
        );

        $expectedTitle = (
            $details['seo_title']
            ?? $details['name']
        )
            .' | '
            .config('seo.site_name');

        $expectedDescription = $details['seo_description']
            ?? $details['summary'];

        $expectedUrl = route(
            'services.show',
            $service
        );

        $response = $this
            ->get($expectedUrl)
            ->assertOk();

        $response
            ->assertSee(
                $expectedTitle
            )
            ->assertSee(
                $expectedDescription,
                false
            )
            ->assertSee(
                'rel="canonical"',
                false
            )
            ->assertSee(
                'href="'.$expectedUrl.'"',
                false
            )
            ->assertSee(
                'property="og:title"',
                false
            )
            ->assertSee(
                'property="og:description"',
                false
            )
            ->assertSee(
                'property="og:url"',
                false
            )
            ->assertSee(
                'name="twitter:title"',
                false
            )
            ->assertSee(
                'name="twitter:description"',
                false
            );
    }

    public function test_canonical_url_does_not_include_query_parameters(): void
    {
        $this
            ->get(route('quote', [
                'service' => 'vehicle-importation',
            ]))
            ->assertOk()
            ->assertSee(
                'href="'.route('quote').'"',
                false
            )
            ->assertDontSee(
                'rel="canonical" href="'
                .route('quote')
                .'?service=vehicle-importation"',
                false
            );
    }
}
