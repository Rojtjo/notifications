<?php

namespace spec\Rojtjo\Notifications;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotificationSpec extends ObjectBehavior
{
    function it_can_be_a_success_notification()
    {
        $this->withTypeAndMessage(
            'success',
            'It is a success notification!'
        );
    }

    function it_can_be_an_error_notification()
    {
        $this->withTypeAndMessage(
            'error',
            'It is an error notification!'
        );
    }

    function it_can_be_a_warning_notification()
    {
        $this->withTypeAndMessage(
            'warning',
            'It is a warning notification!'
        );
    }

    function it_can_be_an_info_notification()
    {
        $this->withTypeAndMessage(
            'info',
            'It is an info notification!'
        );
    }

    private function withTypeAndMessage($type, $message)
    {
        $this->beConstructedThrough($type, [
            $message
        ]);

        $this->getType()->shouldBe($type);
        $this->getMessage()->shouldBe($message);
    }
}
