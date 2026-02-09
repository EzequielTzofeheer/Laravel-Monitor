<?php

namespace App\Providers;

use App\Observers\Site\CheckObserver;
use Illuminate\Support\ServiceProvider;

use App\Models\Check;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Check::observe(CheckObserver::class);
    }
}
