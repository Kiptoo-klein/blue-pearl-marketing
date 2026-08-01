<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/request-a-quote', 'pages.quote')->name('quote');
Route::view('/contact', 'pages.contact')->name('contact');
