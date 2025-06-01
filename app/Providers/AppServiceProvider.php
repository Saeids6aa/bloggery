<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

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
        view()->share('about', About::orderBy('id', 'desc')->first());
        view()->share('setting', Setting::orderBy('id', 'desc')->first());
    }
}
