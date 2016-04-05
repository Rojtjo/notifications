<?php

namespace Rojtjo\Notifier\Transports;

use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Notifications;
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

        if ($this->session->has($this->newKey())) {
            $this->moveNewNotificationsToCurrent();
        }
    }

    /**
     * @return void
     */
    private function moveNewNotificationsToCurrent()
    {
        $notifications = $this->session->get($this->newKey());
        $this->session->put($this->currentKey(), $notifications);
        $this->session->put($this->newKey(), []);
    }

    /**
     * @param Notification $notification
     * @return void
     */
    public function send(Notification $notification)
    {
        $this->session->push($this->newKey(), [
            'type' => $notification->getType(),
            'message' => $notification->getMessage(),
        ]);
    }

    /**
     * @return Notifications
     */
    public function getCurrentNotifications()
    {
        $notifications = $this->session->get($this->currentKey());

        return Notifications::mapFromArray($notifications);
    }

    /**
     * @return string
     */
    private function newKey()
    {
        return $this->key . '.new';
    }

    /**
     * @return string
     */
    private function currentKey()
    {
        return $this->key . '.current';
    }
}
