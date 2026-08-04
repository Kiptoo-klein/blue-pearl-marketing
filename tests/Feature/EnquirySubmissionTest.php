<?php

namespace Tests\Feature;

use App\Mail\QuoteEnquiryReceived;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class EnquirySubmissionTest extends TestCase
{
    use RefreshDatabase;

    public function test_enquiry_can_be_submitted_with_a_phone_number(): void
    {
        Mail::fake();

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

        Mail::assertSent(
            QuoteEnquiryReceived::class,
            fn (QuoteEnquiryReceived $mail): bool => $mail->hasTo(
                config('company.email')
            )
        );
    }

    public function test_blue_pearl_can_reply_directly_to_the_customer(): void
    {
        Mail::fake();

        $this
            ->from(route('quote'))
            ->post(route('quote.store'), [
                'name' => 'Customer Name',
                'phone' => '',
                'email' => 'customer@example.com',
                'service' => 'vehicle-importation',
                'message' => 'I need help importing a vehicle.',
                'website' => '',
            ])
            ->assertRedirect(route('quote'))
            ->assertSessionHas('success');

        Mail::assertSent(
            QuoteEnquiryReceived::class,
            fn (QuoteEnquiryReceived $mail): bool => $mail->hasTo(
                config('company.email')
            ) && $mail->hasReplyTo(
                'customer@example.com'
            )
        );
    }
}
