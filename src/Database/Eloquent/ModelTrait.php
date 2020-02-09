<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent;

use Exception;
use Ramsey\Uuid\Uuid;

trait ModelTrait
{
    /**
     * Indicates if the IDs are UUIDs.
     *
     * @var bool
     */
    protected $keyIsUuid = true;

    /**
     * The UUID version to use.
     *
     * @var int
     */
    protected $uuidVersion = 4;

    /**
     * The "booting" method of the model.
     */
    protected static function bootModelTrait(): void
    {
        static::creating(function (self $model): void {
            // Automatically generate a UUID if using them, and not provided.
            if ($model->keyIsUuid && empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = $model->generateUuid();
            }
        });
    }

    /**
     * @throws \Exception
     * @return string
     */
    protected function generateUuid(): string
    {
        switch ($this->uuidVersion) {
            case 1:
                return Uuid::uuid1()->toString();
            case 4:
                return Uuid::uuid4()->toString();
        }

        throw new Exception("UUID version [{$this->uuidVersion}] not supported.");
    }
}
