<?php

namespace SoNotion;

use Illuminate\Support\ServiceProvider;

class SoNotionServiceProvider extends ServiceProvider
{

    function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . "/../config/so-notion.php" => config_path("so-notion.php"),
            ]);
        }
    }

    function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/so-notion.php", "so-notion");

        $this->app->singleton(SoNotion::class, function () {
            return new SoNotion(config("so-notion.apiToken"));
        });
    }
}
