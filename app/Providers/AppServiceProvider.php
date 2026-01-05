<?php

namespace App\Providers;

use App\Models\ListMail;
use App\Models\Subscript;
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
        ListMail::unguard();
        Subscript::unguard();
    }
}
