<?php

namespace Rojtjo\Notifier\Transports;

use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\SessionStore;
use Rojtjo\Notifier\Transport;

class SessionTransport implements Transport
{
    /**
     * @var SessionStore
     */
    private $session;

    /**
     * @param SessionStore $session
     */
    public function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * @param Notification $notification
     * @return void
     */
    public function send(Notification $notification)
    {
        $this->session->push($notification);
    }
}
