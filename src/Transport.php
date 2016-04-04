<?php

namespace Rojtjo\Notifications;

interface Transport
{
    /**
     * @param Notification $notification
     * @return void
     */
    public function send(Notification $notification);
}
