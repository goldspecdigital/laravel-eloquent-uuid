<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Console;

use Illuminate\Console\GeneratorCommand;

class UuidModelCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'uuid:make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new UUID Model';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'UUID Model';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return realpath(__DIR__ . '/Stubs/UUID.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Models';
    }
}
