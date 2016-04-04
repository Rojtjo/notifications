<?php

namespace Rojtjo\Notifier;

interface SessionStore
{
    /**
     * @param string $key
     * @param array $notification
     * @return void
     */
    public function push($key, array $notification);
}
