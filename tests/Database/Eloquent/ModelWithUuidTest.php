<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Tests\Database\Eloquent;

use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelWithUuid;
use GoldSpecDigital\LaravelEloquentUUID\Tests\TestCase;
use Illuminate\Support\Str;

class ModelWithUuidTest extends TestCase
{
    /** @test */
    public function it_generates_a_uuid_when_the_id_has_not_been_set(): void
    {
        /** @var \GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelWithUuid $testModel */
        $testModel = TestModelWithUuid::query()->create();

        $this->assertEquals(36, mb_strlen($testModel->id));
    }

    /** @test */
    public function it_uses_the_uuid_provided_when_id_has_been_set(): void
    {
        $uuid = Str::uuid()->toString();

        /** @var \GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelWithUuid $testModel */
        $testModel = TestModelWithUuid::query()->create([
            'id' => $uuid,
        ]);

        $this->assertEquals($uuid, $testModel->id);
    }
}
