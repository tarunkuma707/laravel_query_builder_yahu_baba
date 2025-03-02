<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Reader;
use App\Observers\PostObserver;
use App\Observers\ReaderObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
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
        //
        //Paginator::useBootstrapFive();
        //Paginator::useBootstrapFour();
        Reader::observe(ReaderObserver::class);
        Post::observe(PostObserver::class);
    }
}
