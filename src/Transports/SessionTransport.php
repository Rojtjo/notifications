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
     * @var string
     */
    private $key;

    /**
     * @param SessionStore $session
     * @param string $key
     */
    public function __construct(SessionStore $session, $key = 'notifications')
    {
        $this->session = $session;
        $this->key = $key;
    }

    /**
     * @param Notification $notification
     * @return void
     */
    public function send(Notification $notification)
    {
        $this->session->push($this->key . '.new', [
            'type' => $notification->getType(),
            'message' => $notification->getMessage(),
        ]);
    }
}
