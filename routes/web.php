<?php

use App\Http\Controllers\QuoteRequestController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');

Route::view('/about', 'pages.about')->name('about');

Route::view('/services', 'pages.services')->name('services');

Route::get(
    '/services/{service}',
    [ServiceController::class, 'show']
)->name('services.show');

Route::view('/faq', 'pages.faq')->name('faq');

Route::view(
    '/request-a-quote',
    'pages.quote'
)->name('quote');

Route::post(
    '/request-a-quote',
    [QuoteRequestController::class, 'store']
)->name('quote.store');

Route::view('/contact', 'pages.contact')->name('contact');

/*
|--------------------------------------------------------------------------
| Sitemap
|--------------------------------------------------------------------------
|
| Only genuine public logistics services are included. Laravel service
| configuration entries such as Postmark, Resend, SES and Slack must never
| appear in the public sitemap.
|
*/

Route::get('/sitemap.xml', function () {
    $serviceUrls = collect(config('services'))
        ->filter(
            fn (mixed $service): bool =>
                is_array($service)
                && isset(
                    $service['name'],
                    $service['summary']
                )
        )
        ->keys()
        ->map(
            fn (string $service): string =>
                route('services.show', $service)
        );

    $urls = collect([
        route('home'),
        route('about'),
        route('services'),
        route('faq'),
        route('quote'),
        route('contact'),
    ])->merge($serviceUrls);

    return response()
        ->view('sitemap', [
            'urls' => $urls,
        ])
        ->header(
            'Content-Type',
            'application/xml'
        );
})->name('sitemap');

/*
|--------------------------------------------------------------------------
| Robots.txt
|--------------------------------------------------------------------------
|
| Preview and development environments block crawling completely.
| Search engines are allowed only when SEO_INDEXING_ENABLED=true.
|
*/

Route::get('/robots.txt', function () {
    if (! config('seo.indexing_enabled')) {
        return response(
            "User-agent: *\nDisallow: /\n",
            200,
            [
                'Content-Type' => 'text/plain',
            ]
        );
    }

    return response(
        "User-agent: *\nAllow: /\nSitemap: ".route('sitemap')."\n",
        200,
        [
            'Content-Type' => 'text/plain',
        ]
    );
})->name('robots');
