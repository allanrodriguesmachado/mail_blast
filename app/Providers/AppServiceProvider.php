<?php

namespace App\Providers;

use App\Models\{Mail, Subscribe};
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Mail::unguard();
        Subscribe::unguard();
    }
}
