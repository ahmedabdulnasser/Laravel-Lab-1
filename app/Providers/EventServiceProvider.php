<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
    protected $listen = [
        \App\Events\CreateNewPost::class => [
            \App\Listeners\IncreasePostCount::class
        ]
    ];
}
