<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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

        View::composer('front.layouts.side-posts', function ($view) {
            $recentPosts = Cache::remember('recent_posts', now()->addMinutes(10), function () {
                return Post::orderBy('created_at', 'desc')
                    ->take(3)
                    ->get();
            });

            $view->with('recentPosts', $recentPosts);
        });
    }
}
