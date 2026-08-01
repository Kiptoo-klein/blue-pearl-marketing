<?php

namespace App\Http\Controllers;

use App\Mail\QuoteEnquiryReceived;
use App\Models\QuoteRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class QuoteRequestController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:120',
            ],
            'phone' => [
                'nullable',
                'string',
                'max:40',
                'required_without:email',
            ],
            'email' => [
                'nullable',
                'email',
                'max:160',
                'required_without:phone',
            ],
            'service' => [
                'required',
                Rule::in([
                    'customs-clearance',
                    'freight-forwarding',
                    'container-handling',
                    'vehicle-importation',
                    'transport-delivery',
                    'general-cargo',
                    'other',
                ]),
            ],
            'message' => [
                'required',
                'string',
                'max:1500',
            ],
            'website' => [
                'nullable',
                'max:0',
            ],
        ]);

        unset($validated['website']);

        $quoteRequest = QuoteRequest::query()->create($validated);

        Mail::to(config('company.email'))->send(
            new QuoteEnquiryReceived($quoteRequest)
        );

        return back()->with(
            'success',
            'Thank you. Your enquiry has been received.'
        );
    }
}
