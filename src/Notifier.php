<?php

namespace Rojtjo\Notifier;

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
     * @return void
     */
    public function send(Notification $notification)
    {
        $this->transport->send($notification);
    }

    /**
     * @return Notifications
     */
    public function getCurrentNotifications()
    {
        return $this->transport->getCurrentNotifications();
    }
}
