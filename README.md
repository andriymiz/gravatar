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

To associate gravatar with a model, the model must implement the following interface and trait:

```php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Andriymiz\Gravatar\HasGravatar;
use Andriymiz\Gravatar\InteractsWithGravatar;

class YourModel extends Model implements HasGravatar
{
    use InteractsWithGravatar;
}
```
