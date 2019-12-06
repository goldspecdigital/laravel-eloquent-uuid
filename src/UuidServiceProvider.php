<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID;

use GoldSpecDigital\LaravelEloquentUUID\Console\UuidModelCommand;
use Illuminate\Support\ServiceProvider;

class UuidServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UuidModelCommand::class,
            ]);
        }
    }
}
