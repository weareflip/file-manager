<?php

namespace Flip\FileManager;

use Illuminate\Support\ServiceProvider;
use Flip\FileManager\Commands\Symlink;

class FileManagerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/file-manager.php', 'file-manager');

        if (config('file-manager.load_api_routes')) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        }

        if (config('file-manager.load_web_routes')) {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        }
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'flipninja/file-manager');

        $this->app->singleton(FileManager::class, function () {
            return new FileManager();
        });

        if ($this->app->runningInConsole()) {
            $this->commands([Symlink::class]);
        }
    }
}
