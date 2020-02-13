<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Tests\Database\Eloquent;

use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelExtendingClassWithoutUuid1;
use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelExtendingClassWithoutUuid4;
use GoldSpecDigital\LaravelEloquentUUID\Tests\TestCase;
use PDOException;

class ModelExtendingClassWithoutUuidTest extends TestCase
{
    /** @test */
    public function it_does_not_generate_a_uuid1_when_no_id_has_been_set(): void
    {
        $this->expectException(PDOException::class);

        TestModelExtendingClassWithoutUuid1::query()->create();
    }

    /** @test */
    public function it_does_not_generate_a_uuid4_when_no_id_has_been_set(): void
    {
        $this->expectException(PDOException::class);

        TestModelExtendingClassWithoutUuid4::query()->create();
    }
}
