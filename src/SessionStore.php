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

    /**
     * @param string $key
     * @return bool
     */
    public function has($key);

    /**
     * @param string $key
     * @return array
     */
    public function get($key);

    /**
     * @param string $key
     * @param array $notifications
     * @return void
     */
    public function put($key, array $notifications);
}
