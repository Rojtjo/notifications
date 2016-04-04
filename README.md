# Notifications

Easily send notifications.

## Installation

```
$ composer require rojtjo/notifications
```

## Usage

```php
use Rojtjo\Notifications\ArrayTransport;
use Rojtjo\Notifications\Notification;
use Rojtjo\Notifications\Notifier;

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
