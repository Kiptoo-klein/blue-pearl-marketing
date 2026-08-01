<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnquirySubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_enquiry_can_be_submitted_with_a_phone_number(): void
    {
        $this
            ->from(route('quote'))
            ->post(route('quote.store'), [
                'name' => 'Jane Client',
                'phone' => '+254700000001',
                'email' => '',
                'service' => 'customs-clearance',
                'message' => 'I need help clearing imported goods.',
                'website' => '',
            ])
            ->assertRedirect(route('quote'))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('quote_requests', [
            'name' => 'Jane Client',
            'phone' => '+254700000001',
            'service' => 'customs-clearance',
            'status' => 'new',
        ]);
    }
}
