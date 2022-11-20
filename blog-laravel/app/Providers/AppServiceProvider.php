<?php

namespace App\Providers;

use Package\UserAgent\Test\ParserJenssegers;
use Package\Interface\Test\UserAgentInterface;
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
