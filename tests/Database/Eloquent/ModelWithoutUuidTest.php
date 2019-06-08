<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Tests\Database\Eloquent;

use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelWithoutUuid;
use GoldSpecDigital\LaravelEloquentUUID\Tests\TestCase;
use PDOException;

class ModelWithoutUuidTest extends TestCase
{
    /** @test */
    public function it_does_not_generate_a_uuid_when_no_id_has_been_set(): void
    {
        $this->expectException(PDOException::class);

        TestModelWithoutUuid::query()->create();
    }
}
