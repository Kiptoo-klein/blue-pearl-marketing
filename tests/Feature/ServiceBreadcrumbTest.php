<?php

namespace Tests\Feature;

use Tests\TestCase;

class ServiceBreadcrumbTest extends TestCase
{
    public function test_service_page_has_visible_breadcrumb_navigation(): void
    {
        $service = 'customs-clearance';

        $details = config("services.{$service}");

        $this
            ->get(route('services.show', $service))
            ->assertOk()
            ->assertSee(
                'aria-label="Breadcrumb"',
                false
            )
            ->assertSee('Home')
            ->assertSee('Services')
            ->assertSee($details['name'])
            ->assertSee(
                route('home'),
                false
            )
            ->assertSee(
                route('services'),
                false
            );
    }

    public function test_service_page_has_breadcrumb_structured_data(): void
    {
        $service = 'customs-clearance';

        $details = config("services.{$service}");

        $serviceUrl = route(
            'services.show',
            $service
        );

        $response = $this
            ->get($serviceUrl)
            ->assertOk();

        $response
            ->assertSee(
                '"@type":"BreadcrumbList"',
                false
            )
            ->assertSee(
                '"position":1',
                false
            )
            ->assertSee(
                '"name":"Home"',
                false
            )
            ->assertSee(
                '"item":"'.route('home').'"',
                false
            )
            ->assertSee(
                '"position":2',
                false
            )
            ->assertSee(
                '"name":"Services"',
                false
            )
            ->assertSee(
                '"item":"'.route('services').'"',
                false
            )
            ->assertSee(
                '"position":3',
                false
            )
            ->assertSee(
                '"name":"'.$details['name'].'"',
                false
            )
            ->assertSee(
                '"item":"'.$serviceUrl.'"',
                false
            );
    }
}
