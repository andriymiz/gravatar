# Laravel Gravatar

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Issues](https://img.shields.io/github/issues/andriymiz/gravatar.svg)](https://github.com/andriymiz/gravatar/issues)
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/andriymiz/gravatar.svg)](https://github.com/andriymiz/gravatar/pulls)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](/LICENSE)

This package provides a Laravel wrapper for [Gravatar](https://gravatar.com).

## Features

* TODO

## Requirements

* PHP >= 7.3

## Installation

Via Composer:
```bash
composer config repositories.gravatar git https://github.com/andriymiz/gravatar
composer require andriymiz/gravatar
```

## Configuration

Publishing the config file:
```bash
php artisan vendor:publish --provider="Andriymiz\Gravatar\GravatarServiceProvider" --tag="config"
```

## Usage

To associate gravatar with a model, the model must implement the following trait:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Andriymiz\Gravatar\Traits\GravatarTrait;

class User extends Model
{
    use GravatarTrait;
}
```

Optional you can change email field for identify user:
By default is "email"
```php
    // in a model

    /**
     * For identifying an identity in Gravatar system
     *
     * @return string
     */
    private function getGravatarEmail(): string
    {
        return $this->email;
    }

```

Somewhere in blade template:
```html
<div>
    <img src="{{ $user->getGravatarInstance() }}" alt="Avatar" />
</div>
```

Somewhere in blade template with bigger size:
```html
<section>
    <img src="{{ $user->getGravatarInstance()->setSize(1024) }}" alt="Picture" />
</section>
```

Available setters:
```php
$gravatarInstance
    ->setBaseUrl('https://secure.gravatar.com/avatar')
    ->setDefault('retro')
    ->setForceDefault(true)
    ->setSize(1024)
    ->setRating('pg')
    ->setExtension('.png');
```

Available getters:
```php
$gravatarProfile = $gravatarInstance->getProfile();
```