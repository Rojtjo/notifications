<?php

namespace Rojtjo\Notifier;

use ArrayIterator;
use Countable;
use IteratorAggregate;

class Notifications implements IteratorAggregate, Countable
{
    /**
     * @var Notification[]
     */
    private $notifications;

    /**
     * @param Notification[] $notifications
     */
    public function __construct(array $notifications = [])
    {
        $this->notifications = $notifications;
    }

    /**
     * @param array $notifications
     * @return Notifications
     */
    public static function mapFromArray(array $notifications)
    {
        $mapped = array_map(function(array $notification) {
            return Notification::fromArray($notification);
        }, $notifications);

        return new Notifications($mapped);
    }

    /**
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new ArrayIterator($this->notifications);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->notifications);
    }
}
