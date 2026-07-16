<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/properti', function () {
    return view('properties.index');
})->name('properties.index');

Route::get('/lang/{locale}', function (string $locale): RedirectResponse {
    session()->put('locale', $locale);

    return redirect()->back();
})->whereIn('locale', ['id', 'en'])->name('lang.switch');
