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
}
