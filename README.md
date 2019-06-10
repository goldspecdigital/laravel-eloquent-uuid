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

A simple drop-in solution for providing UUIDv4 support for the IDs of your
Eloquent models.

## Installing

You can install the package via composer:

```bash
composer require goldspecdigital/laravel-eloquent-uuid
```

## Usage

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

### User model

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

### Generating UUIDs

If you don't specify the value for the primary key of your model, a UUIDv4 will
be automatically generated. However, if you do specify your own UUIDv4 then it
will not generate one, but instead use the one you have explicitly provided. This
can be useful when needing the know the ID of the model before you have created
it:

```php
// No UUID provided (automatically generated).
$model = Model::create();
echo $model->id; // abb034ae-fcdc-4200-8094-582b60a4281f

// UUID explicity provided.
$model = Model::create(['id' => '04d7f995-ef33-4870-a214-4e21c51ff76e']);
echo $model->id; // 04d7f995-ef33-4870-a214-4e21c51ff76e
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
