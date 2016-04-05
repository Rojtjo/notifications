<?php

namespace spec\Rojtjo\Notifier\Transports;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Notifications;
use Rojtjo\Notifier\SessionStore;

class SessionTransportSpec extends ObjectBehavior
{
    function let(SessionStore $session)
    {
        $session->has('my-key.new')->willReturn(false);
        $this->beConstructedWith($session, 'my-key');
    }

    function it_is_a_transport()
    {
        $this->shouldImplement('Rojtjo\Notifier\Transport');
    }

    function it_has_the_current_notifications(SessionStore $session)
    {
        $session->get('my-key.current')->willReturn([]);
        $this->getCurrentNotifications()->shouldHaveType(Notifications::class);
    }

    function it_moves_the_notifications_from_new_to_current(SessionStore $session)
    {
        $notifications = [
            [
                'type' => 'success',
                'message' => 'It is successful',
            ],
            [
                'type' => 'error',
                'message' => 'It is an error',
            ],
        ];

        $session->has('my-key.new')->willReturn(true);
        $session->get('my-key.new')->willReturn($notifications);
        $session->put('my-key.current', $notifications)->shouldBeCalled();
        $session->put('my-key.new', [])->shouldBeCalled();
        $session->get('my-key.current')->willReturn($notifications);

        $this->beConstructedWith($session, 'my-key');

        $this->getCurrentNotifications()->shouldHaveType(Notifications::class);
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
