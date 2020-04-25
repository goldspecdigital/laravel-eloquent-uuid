<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent;

use Exception;
use Ramsey\Uuid\Uuid as RamseyUuid;

trait Uuid
{
    /**
     * Indicates if the IDs are UUIDs.
     *
     * @return bool
     */
    protected function keyIsUuid(): bool
    {
        return true;
    }

    /**
     * The UUID version to use.
     *
     * @return int
     */
    protected function uuidVersion(): int
    {
        return 4;
    }

    /**
     * The "booting" method of the model.
     */
    public static function bootUuid(): void
    {
        static::creating(function (self $model): void {
            // Automatically generate a UUID if using them, and not provided.
            if ($model->keyIsUuid() && empty($model->{$model->getKeyName()})) {
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
        switch ($this->uuidVersion()) {
            case 1:
                return RamseyUuid::uuid1()->toString();
            case 4:
                return RamseyUuid::uuid4()->toString();
        }

        throw new Exception("UUID version [{$this->uuidVersion()}] not supported.");
    }
}
