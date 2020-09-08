<p align="center">
    <a href="https://github.com/goldspecdigital/laravel-eloquent-uuid"><img
        alt="Eloquent UUID"
        src="https://svgshare.com/i/DVS.svg" width="400px"
    ></a>
</p>

<p align="center">
    <a href="https://github.com/goldspecdigital/laravel-eloquent-uuid"><img
        alt="GitHub stars"
        src="https://img.shields.io/github/stars/goldspecdigital/laravel-eloquent-uuid.svg?style=social"
    ></a>
</p>

<p align="center">
    <a href="https://github.com/goldspecdigital/laravel-eloquent-uuid/tags"><img
        alt="GitHub tag (latest SemVer)"
        src="https://img.shields.io/github/tag/goldspecdigital/laravel-eloquent-uuid.svg"
    ></a>
    <a href="https://travis-ci.com/goldspecdigital/laravel-eloquent-uuid"><img
        alt="Build status"
        src="https://travis-ci.com/goldspecdigital/laravel-eloquent-uuid.svg?branch=master"
    ></a>
    <a href="https://packagist.org/packages/goldspecdigital/laravel-eloquent-uuid"><img
        alt="Packagist"
        src="https://img.shields.io/packagist/dt/goldspecdigital/laravel-eloquent-uuid.svg"
    ></a>
    <img
        alt="PHP from Packagist"
        src="https://img.shields.io/packagist/php-v/goldspecdigital/laravel-eloquent-uuid.svg"
    >
    <img
        alt="Packagist"
        src="https://img.shields.io/packagist/l/goldspecdigital/laravel-eloquent-uuid.svg"
    >
</p>

## Introduction

A simple drop-in solution for providing UUID support for the IDs of your
Eloquent models.

Both `v1` and `v4` IDs are supported out of the box, however should you need 
`v3` or `v5` support, you can easily add this in.

## Installing

Reference the table below for the correct version to use in conjunction with the
version of Laravel you have installed:

| Laravel | This package |
| ------- | ------------ |
| `v5.8.*` | `v1.*` |
| `v6.*` | `v6.*` |
| `v7.*` | `v7.*` |
| `v8.*` | `v8.*` |

You can install the package via composer:

```bash
composer require goldspecdigital/laravel-eloquent-uuid:^8.0
```

## Usage

There are two ways to use this package:
1. By extending the provided model classes (preferred and simplest method).
2. By using the provided model trait (allows for extending another model class).

### Extending model

When creating a Eloquent model, instead of extending the standard Laravel model
class, extend from the model class provided by this package:

```php
<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class BlogPost extends Model
{
    //
}
```

### Extending user model

The User model that comes with a standard Laravel install has some extra
configuration which is implemented in its parent class. This configuration only
consists of implementing several interfaces and using several traits.

A drop-in replacement has been provided which you can use just as above, by
extending the User class provided by this package:

```php
<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //
}
```

### Using trait

As an alternative to extending the classes in the examples above, you also have
the ability to use the provided trait instead. This requires a more involved
setup process but allows you to extend your models from another class if needed:

```php
<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use Uuid;
    
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
```

### Generating UUIDs

If you don't specify the value for the primary key of your model, a UUID will
be automatically generated. However, if you do specify your own UUID then it
will not generate one, but instead use the one you have explicitly provided. 
This can be useful when needing the know the ID of the model before you have 
created it:

```php
// No UUID provided (automatically generated).
$model = Model::create();
echo $model->id; // abb034ae-fcdc-4200-8094-582b60a4281f

// UUID explicity provided.
$model = Model::create(['id' => '04d7f995-ef33-4870-a214-4e21c51ff76e']);
echo $model->id; // 04d7f995-ef33-4870-a214-4e21c51ff76e
```

### Specifying UUID versions

By default, `v4` UUIDs will be used for your models. However, you can also 
specify `v1` UUIDs to be used by setting the following property/method on your 
model:

#### When extending the class

```php
<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;

class BlogPost extends Model
{
    /**
     * The UUID version to use.
     *
     * @var int
     */
    protected $uuidVersion = 1;
}
```

#### When using the trait

```php
<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Uuid;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use Uuid;

    /**
     * The UUID version to use.
     *
     * @return int
     */
    protected function uuidVersion(): int
    {
        return 1;
    }
}
```

#### Support for `v3` and `v5`

Should you need support for `v3` or `v5` UUIDs, you can simply override the
method which is responsible for generating the UUIDs:

```php
<?php

namespace App\Models;

use GoldSpecDigital\LaravelEloquentUUID\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class BlogPost extends Model
{
    /**
     * @throws \Exception
     * @return string
     */
    protected function generateUuid(): string
    {
        // UUIDv3 has been used here, but you can also use UUIDv5.
        return Uuid::uuid3(Uuid::NAMESPACE_DNS, 'example.com')->toString();
    }
}
```

### Creating models

In addition of the `make:model` artisan command, you will now have access to
`uuid:make:model` which has all the functionality of the standard `make:model`
command (with exception of not being able to create a pivot model):

```bash
php artisan uuid:make:model Models/Post --all
```

### Database migrations

The default primary ID column used in migrations will not work with UUID primary
keys, as the default column type is an unsigned integer. UUIDs are 36 character 
strings so we must specify this in our migrations:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table): void {
            // Primary key.
            $table->uuid('id')->primary();
        });
    }
}

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table): void {
            // Primary key.
            $table->uuid('id')->primary();
        
            // Foreign key.
            $table->uuid('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
```

## Running the tests

To run the test suite you can use the following commands:

```bash
# To run both style and unit tests.
composer test

# To run only style tests.
composer test:style

# To run only unit tests.
composer test:unit
```

If you receive any errors from the style tests, you can automatically fix most,
if not all of the issues with the following command:

```bash
composer fix:style
```

## Contributing

Please read [CONTRIBUTING.md](CONTRIBUTING.md) for details on our code of
conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available,
see the [tags on this repository](https://github.com/goldspecdigital/laravel-eloquent-uuid/tags).

## Authors

* [GoldSpec Digital](https://github.com/goldspecdigital)

See also the list of [contributors](https://github.com/goldspecdigital/laravel-eloquent-uuid/contributors)
who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md)
file for details.
