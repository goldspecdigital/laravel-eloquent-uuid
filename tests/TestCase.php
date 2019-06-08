<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Tests;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpDatabase($this->app);
    }

    /**
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase(Application $app): void
    {
        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('test_model_with_uuids', function (Blueprint $table): void {
                $table->uuid('id')->primary();
                $table->timestamps();
            });

        $app['db']->connection()
            ->getSchemaBuilder()
            ->create('test_model_without_uuids', function (Blueprint $table): void {
                $table->string('id')->primary();
                $table->timestamps();
            });
    }
}
