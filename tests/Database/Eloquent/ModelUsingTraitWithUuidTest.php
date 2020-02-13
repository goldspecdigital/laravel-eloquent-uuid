<?php

declare(strict_types=1);

namespace GoldSpecDigital\LaravelEloquentUUID\Tests\Database\Eloquent;

use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelUsingTraitWithUuid1;
use GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelUsingTraitWithUuid4;
use GoldSpecDigital\LaravelEloquentUUID\Tests\TestCase;
use Illuminate\Support\Str;

class ModelUsingTraitWithUuidTest extends TestCase
{
    /** @test */
    public function it_generates_a_uuid1_when_the_id_has_not_been_set(): void
    {
        /** @var \GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelUsingTraitWithUuid1 $testModel */
        $testModel = TestModelUsingTraitWithUuid1::query()->create();

        $this->assertEquals(36, mb_strlen($testModel->id));
    }

    /** @test */
    public function it_generates_a_uuid4_when_the_id_has_not_been_set(): void
    {
        /** @var \GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelUsingTraitWithUuid4 $testModel */
        $testModel = TestModelUsingTraitWithUuid4::query()->create();

        $this->assertEquals(36, mb_strlen($testModel->id));
    }

    /** @test */
    public function it_uses_the_uuid1_provided_when_id_has_been_set(): void
    {
        $uuid = Str::uuid()->toString();

        /** @var \GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelUsingTraitWithUuid1 $testModel */
        $testModel = TestModelUsingTraitWithUuid1::query()->create([
            'id' => $uuid,
        ]);

        $this->assertEquals($uuid, $testModel->id);
    }

    /** @test */
    public function it_uses_the_uuid4_provided_when_id_has_been_set(): void
    {
        $uuid = Str::uuid()->toString();

        /** @var \GoldSpecDigital\LaravelEloquentUUID\Tests\Models\TestModelUsingTraitWithUuid4 $testModel */
        $testModel = TestModelUsingTraitWithUuid4::query()->create([
            'id' => $uuid,
        ]);

        $this->assertEquals($uuid, $testModel->id);
    }
}
