<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\{

    // Site
    Site\SiteLivewire,
    Site\SiteCreateLivewire,
    Site\SiteEditLivewire,

    // Site Endpoint
    Site\SiteEndpointLivewire,
    Site\SiteEndpointCreateLivewire,
    Site\SiteEndpointEditLivewire,

};

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Site
    Route::get('/site', SiteLivewire::class)->name('site');
    Route::get('/site/create', SiteCreateLivewire::class)->name('site.create');
    Route::get('/site/{id}/edit', SiteEditLivewire::class)->name('site.edit');

    // Site Endpoint
    Route::get('/site/{id}/endpoint', SiteEndpointLivewire::class)->name('site.endpoint');
    Route::get('/site/{id}/endpoint/create', SiteEndpointCreateLivewire::class)->name('site.endpoint.create');
    Route::get('/site/{id}/endpoint/{idEndpoint}', SiteEndpointEditLivewire::class)->name('site.endpoint.edit');

});
