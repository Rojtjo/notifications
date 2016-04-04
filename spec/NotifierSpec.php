<?php

namespace spec\Rojtjo\Notifications;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifications\Notification;
use Rojtjo\Notifications\Transport;

class NotifierSpec extends ObjectBehavior
{
    function let(Transport $transport)
    {
        $this->beConstructedWith($transport);
    }

    function it_can_send_a_notification(Transport $transport)
    {
        $notification = Notification::success('It was successful');
        $transport->send($notification)->shouldBeCalled();
        $this->send($notification);
    }
}
