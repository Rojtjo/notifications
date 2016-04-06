<?php

namespace Rojtjo\Notifier;

interface Transport
{
    /**
     * @param Notification $notification
     * @return void
     */
    public function send(Notification $notification);

    /**
     * @return Notifications
     */
    public function getCurrentNotifications();
}
