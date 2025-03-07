<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Reader;
use App\Models\User;
use App\Observers\PostObserver;
use App\Observers\ReaderObserver;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('isAdmin',function(User $user){
            return $user->role==='admin';
        });
        Gate::define('view-profile',function(User $user,$profileUser){
            return $user->id===$profileUser;
        });

        Gate::define('udpate-post',function(User $user, $targetUser){
            return $user->id===$targetUser;
        });

        Gate::define('delete-post',function(User $user, $targetUser){
            return $user->id===$targetUser;
        });

        Gate::before(function(User $user){
            echo "Before Gate";
        });

        Gate::after(function(User $user){
            echo "After Gate";
        });
    }
}
