<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Console;

use Illuminate\Foundation\Console\ModelMakeCommand;

class UuidModelCommand extends ModelMakeCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'uuid:make:model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Eloquent UUID model class';

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
    protected function getStub(): string
    {
        return realpath(__DIR__ . '/Stubs/model.stub');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions(): array
    {
        // Remove the pivot option from the parent class.
        return array_filter(
            parent::getOptions(),
            function (array $option): bool {
                return $option[0] !== 'pivot';
            }
        );
    }

    /**
     * Get the value of a command option.
     *
     * @param string|null $key
     * @return string|array|bool|null
     */
    public function option($key = null)
    {
        if ($key === 'pivot') {
            return false;
        }

        return parent::option($key);
    }
}
