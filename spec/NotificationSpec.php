<?php

namespace spec\Rojtjo\Notifier;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NotificationSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('success', 'It is a success notification!');
    }

    function it_has_a_type()
    {
        $this->getType()->shouldBe('success');
    }

    function it_has_a_message()
    {
        $this->getMessage()->shouldBe('It is a success notification!');
    }

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

    function it_can_be_made_from_an_array()
    {
        $this->beConstructedThrough('fromArray', [[
            'type' => 'success',
            'message' => 'It is a success notification!'
        ]]);

        $this->getType()->shouldBe('success');
        $this->getMessage()->shouldBe('It is a success notification!');
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
