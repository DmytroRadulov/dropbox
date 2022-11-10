<?php

namespace App\Providers;

use App\Services\UserAgent\ParserJenssegers;
use App\Services\UserAgent\UserAgentInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserAgentInterface::class, function () {
            return new ParserJenssegers();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
