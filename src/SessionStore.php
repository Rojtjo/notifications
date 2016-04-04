<?php

namespace Rojtjo\Notifier;

interface SessionStore
{
    /**
     * @param Notification $notification
     * @return void
     */
    public function push(Notification $notification);
}
