# Notifier

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Easily send notifications.

## Installation

```
$ composer require rojtjo/notifications
```

## Usage

```php
use Rojtjo\Notifier\ArrayTransport;
use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Notifier;

$transport = new ArrayTransport();
$notifier = new Notifier($transport);

$notifier->send(Notification::success('A successful notification'));
```

## Integrations

You can use one of the integrations below to get started more quickly.

* Laravel integration: https://github.com/rojtjo/notifications-laravel

## Documentation

Coming soon

## Security

If you discover any security related issues, please email me@rojvroemen.com instead of using the issue tracker.

[ico-version]: https://img.shields.io/packagist/v/Rojtjo/notifier.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/Rojtjo/notifier/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/rojtjo/notifier.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/rojtjo/notifier.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/Rojtjo/notifier.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/Rojtjo/notifier
[link-travis]: https://travis-ci.org/Rojtjo/notifier
[link-scrutinizer]: https://scrutinizer-ci.com/g/rojtjo/notifier/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/rojtjo/notifier
[link-downloads]: https://packagist.org/packages/Rojtjo/notifier
