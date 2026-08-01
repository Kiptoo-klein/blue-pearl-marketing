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

Route::view('/request-a-quote', 'pages.quote')->name('quote');

Route::post(
    '/request-a-quote',
    [QuoteRequestController::class, 'store']
)->name('quote.store');

Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/sitemap.xml', function () {
    $urls = collect([
        route('home'),
        route('about'),
        route('services'),
        route('faq'),
        route('quote'),
        route('contact'),
    ])->merge(
        collect(config('services'))
            ->keys()
            ->map(
                fn (string $service): string => route(
                    'services.show',
                    $service
                )
            )
    );

    return response()
        ->view('sitemap', ['urls' => $urls])
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

Route::get('/robots.txt', function () {
    return response(
        "User-agent: *\nAllow: /\nSitemap: ".route('sitemap')."\n",
        200,
        ['Content-Type' => 'text/plain']
    );
})->name('robots');
