<?php

namespace GoldSpecDigital\LaravelEloquentUUID;

use Illuminate\Support\ServiceProvider;
use GoldSpecDigital\LaravelEloquentUUID\Console\UuidModelCommand;

class UuidServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UuidModelCommand::class,
            ]);
        }
    }
}
