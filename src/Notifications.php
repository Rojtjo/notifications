<?php

namespace Rojtjo\Notifier;

use ArrayIterator;
use Countable;
use IteratorAggregate;

class Notifications implements IteratorAggregate, Countable
{
    /**
     * @var array
     */
    private $notifications;

    /**
     * @param array $notifications
     */
    public function __construct(array $notifications = [])
    {
        $this->notifications = $notifications;
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
