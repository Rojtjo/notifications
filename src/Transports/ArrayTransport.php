<?php

namespace Rojtjo\Notifier\Transports;

use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Transport;

class ArrayTransport implements Transport
{
    /**
     * @var array
     */
    private $notifications = [];

    /**
     * @param Notification $notification
     * @return void
     */
    public function send(Notification $notification)
    {
        $this->notifications[] = $notification;
    }

    /**
     * @return array
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}
