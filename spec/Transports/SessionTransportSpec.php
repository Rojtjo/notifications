<?php

namespace spec\Rojtjo\Notifier\Transports;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\SessionStore;

class SessionTransportSpec extends ObjectBehavior
{
    function let(SessionStore $session)
    {
        $this->beConstructedWith($session, 'my-key');
    }

    function it_is_a_transport()
    {
        $this->shouldImplement('Rojtjo\Notifier\Transport');
    }

    function it_sends_the_notifications_to_the_session_store(SessionStore $session)
    {
        $notification = Notification::success('It was successful');
        $session->push('my-key.new', [
            'type' => $notification->getType(),
            'message' => $notification->getMessage(),
        ])->shouldBeCalled();
        $this->send($notification);
    }
}
