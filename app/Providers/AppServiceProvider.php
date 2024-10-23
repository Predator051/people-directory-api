<?php

namespace App\Providers;

use App\Contracts\GrantContract;
use App\Contracts\PeopleContract;
use App\Contracts\UserContract;
use App\Services\GrantService;
use App\Services\PeopleService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        app()->bind(UserContract::class, UserService::class);
        app()->bind(GrantContract::class, GrantService::class);
        app()->bind(PeopleContract::class, PeopleService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
