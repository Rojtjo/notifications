<?php

namespace spec\Rojtjo\Notifications;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifications\Notification;

class ArrayTransportSpec extends ObjectBehavior
{
    function it_is_a_transport()
    {
        $this->shouldImplement('Rojtjo\Notifications\Transport');
    }

    function it_stores_the_sent_notifications_in_an_array()
    {
        $notification = Notification::success('It was successful');
        $this->send($notification);

        $this->getNotifications()->shouldBe([
            $notification
        ]);
    }
}
