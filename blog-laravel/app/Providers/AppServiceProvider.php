<?php

namespace App\Providers;

use Package\UserAgent\Test\ParserJenssegers;
use Package\Interface\Test\UserAgentInterface;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client as DropboxClient;
use Spatie\FlysystemDropbox\DropboxAdapter;
use Illuminate\Filesystem\FilesystemAdapter;

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

        Storage::extend('dropbox', function ($app, $config) {
            $adapter = new DropboxAdapter(
                new DropboxClient($config['token'])
            );

            return new FilesystemAdapter(
                new Filesystem($adapter, $config),
                $adapter,
                $config
            );
        });
    }
}
