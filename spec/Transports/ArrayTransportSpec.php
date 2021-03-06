<?php

namespace spec\Rojtjo\Notifier\Transports;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifier\Notification;

class ArrayTransportSpec extends ObjectBehavior
{
    function it_is_a_transport()
    {
        $this->shouldImplement('Rojtjo\Notifier\Transport');
    }

    function it_stores_the_sent_notifications_in_an_array()
    {
        $notification = Notification::success('It was successful');
        $this->send($notification);

        $this->getNewNotifications()->shouldBe([
            $notification
        ]);
    }

    function it_can_get_the_current_notifications()
    {
        $notification = Notification::success('It was successful');
        $this->send($notification);

        $this->getCurrentNotifications()->shouldBe([]);
    }
}
