<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Tests\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class TestModelExtendingClassWithoutUuid4 extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'test_model_without_uuids';

    /**
     * Indicates if the IDs are UUIDs.
     *
     * @var bool
     */
    protected $keyIsUuid = false;
}
