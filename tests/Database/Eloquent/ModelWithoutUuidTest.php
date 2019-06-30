<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Tests\Database\Eloquent;

use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelWithoutUuid1;
use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelWithoutUuid4;
use GoldSpecDigital\LaravelEloquentUUID\Tests\TestCase;
use PDOException;

class ModelWithoutUuidTest extends TestCase
{
    /** @test */
    public function it_does_not_generate_a_uuid1_when_no_id_has_been_set(): void
    {
        $this->expectException(PDOException::class);

        TestModelWithoutUuid1::query()->create();
    }

    /** @test */
    public function it_does_not_generate_a_uuid4_when_no_id_has_been_set(): void
    {
        $this->expectException(PDOException::class);

        TestModelWithoutUuid4::query()->create();
    }
}
