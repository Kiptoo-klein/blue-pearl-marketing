<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class QuoteEnquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public QuoteRequest $quoteRequest,
    ) {}

    public function envelope(): Envelope
    {
        $replyTo = $this->quoteRequest->email
            ? [
                new Address(
                    $this->quoteRequest->email,
                    $this->quoteRequest->name,
                ),
            ]
            : [];

        return new Envelope(
            replyTo: $replyTo,
            subject: 'New website enquiry: '.Str::headline(
                $this->quoteRequest->service
            ),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quote-enquiry-received',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
