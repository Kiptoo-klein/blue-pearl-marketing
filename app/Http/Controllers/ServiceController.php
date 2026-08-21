<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class ServiceController extends Controller
{
    public function show(string $service): View
    {
        $details = config("services.{$service}");

        abort_unless(
            is_array($details)
            && isset($details['name']),
            404
        );

        return view('pages.service-show', [
            'service' => $service,
            'details' => $details,
        ]);
    }
}
