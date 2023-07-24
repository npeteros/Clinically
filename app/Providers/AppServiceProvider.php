<?php

namespace App\Providers;
use Illuminate\Support\Facades\Blade;
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
        Blade::if('admin', function () {
            // Retrieve the authenticated user
            $user = auth()->user();

            // Check if the user is authenticated and their 'type' field is 'admin'
            return $user && $user->type === 'admin';
        });
    }
}
