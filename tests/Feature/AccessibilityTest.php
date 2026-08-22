<?php

namespace Tests\Feature;

use Tests\TestCase;

class AccessibilityTest extends TestCase
{
    public function test_layout_has_skip_navigation(): void
    {
        $this
            ->get(route('home'))
            ->assertOk()
            ->assertSee(
                'href="#main-content"',
                false
            )
            ->assertSee(
                'Skip to main content'
            )
            ->assertSee(
                'id="main-content"',
                false
            )
            ->assertSee(
                'tabindex="-1"',
                false
            );
    }

    public function test_navigation_landmarks_have_accessible_names(): void
    {
        $this
            ->get(route('home'))
            ->assertOk()
            ->assertSee(
                'aria-label="Primary"',
                false
            )
            ->assertSee(
                'aria-label="Mobile"',
                false
            );
    }

    public function test_service_page_marks_services_as_current_in_both_navigations(): void
    {
        $response = $this
            ->get(
                route(
                    'services.show',
                    'customs-clearance'
                )
            )
            ->assertOk();

        $content = $response->getContent();

        $servicesUrl = preg_quote(
            route('services'),
            '/'
        );

        $this->assertMatchesRegularExpression(
            '/<nav\s+aria-label="Primary"[\s\S]*?'
            .'<a[^>]*href="'.$servicesUrl.'"'
            .'[^>]*aria-current="page"'
            .'[\s\S]*?>\s*Services\s*<\/a>'
            .'[\s\S]*?<\/nav>/',
            $content
        );

        $this->assertMatchesRegularExpression(
            '/<nav\s+aria-label="Mobile"[\s\S]*?'
            .'<a[^>]*href="'.$servicesUrl.'"'
            .'[^>]*aria-current="page"'
            .'[\s\S]*?>\s*Services\s*<\/a>'
            .'[\s\S]*?<\/nav>/',
            $content
        );
    }

    public function test_quote_form_has_accessible_contact_fields(): void
    {
        $this
            ->get(route('quote'))
            ->assertOk()
            ->assertSee(
                'autocomplete="name"',
                false
            )
            ->assertSee(
                'type="tel"',
                false
            )
            ->assertSee(
                'autocomplete="tel"',
                false
            )
            ->assertSee(
                'autocomplete="email"',
                false
            )
            ->assertSee(
                'aria-describedby="contact-help"',
                false
            )
            ->assertSee(
                'id="contact-help"',
                false
            );
    }

    public function test_faq_decorative_icons_are_hidden_from_assistive_technology(): void
    {
        $response = $this
            ->get(route('faq'))
            ->assertOk();

        $content = $response->getContent();

        $this->assertMatchesRegularExpression(
            '/aria-hidden="true"\s+class="text-xl text-cyan-700 transition group-open:rotate-45"/',
            $content
        );
    }
}
