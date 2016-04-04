<?php

namespace Rojtjo\Notifications;

class Notifier
{
    /**
     * @var Transport
     */
    private $transport;

    /**
     * @param Transport $transport
     */
    public function __construct(Transport $transport)
    {
        $this->transport = $transport;
    }

    /**
     * @param Notification $notification
     */
    public function send(Notification $notification)
    {
        $this->transport->send($notification);
    }
}
