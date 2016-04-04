<?php

namespace spec\Rojtjo\Notifier;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifier\Notification;

class NotificationsSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith([
            Notification::success('It is successful'),
            Notification::error('It is an error'),
        ]);
    }

    function it_is_an_iterator()
    {
        $this->shouldImplement('IteratorAggregate');
    }

    function it_is_countable()
    {
        $this->shouldImplement('Countable');
        $this->count()->shouldBe(2);
    }
}
