<?php

namespace Rojtjo\Notifier\Transports;

use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Transport;

class ArrayTransport implements Transport
{
    /**
     * @var array
     */
    private $new = [];

    /**
     * @var array
     */
    private $current = [];

    /**
     * @param Notification $notification
     * @return void
     */
    public function send(Notification $notification)
    {
        $this->new[] = $notification;
    }

    /**
     * @return array
     */
    public function getNewNotifications()
    {
        return $this->new;
    }

    /**
     * @return array
     */
    public function getCurrentNotifications()
    {
        return $this->current;
    }
}
