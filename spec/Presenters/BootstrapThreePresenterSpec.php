<?php

namespace spec\Rojtjo\Notifier\Presenters;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Notifications;

class BootstrapThreePresenterSpec extends ObjectBehavior
{
    function it_is_a_presenter()
    {
        $this->shouldImplement('Rojtjo\Notifier\Presenter');
    }

    function it_can_render_the_given_notifications()
    {
        $notifications = $this->createNotifications();

        $this->render($notifications)->shouldBe(<<<HTML
<div class="alert alert-success" role="alert">
    It is successful
</div>
<div class="alert alert-danger" role="alert">
    It is an error
</div>
<div class="alert alert-warning" role="alert">
    It is a warning
</div>
<div class="alert alert-info" role="alert">
    It is info
</div>

HTML
);
    }

    function it_allows_the_class_name_suffix_map_to_be_configurable_by_merging_with_the_default()
    {
        $this->beConstructedWith([
            'success' => 'something-else-success',
            'error' => 'something-else-danger',
        ]);

        $notifications = $this->createNotifications();

        $this->render($notifications)->shouldBe(<<<HTML
<div class="alert alert-something-else-success" role="alert">
    It is successful
</div>
<div class="alert alert-something-else-danger" role="alert">
    It is an error
</div>
<div class="alert alert-warning" role="alert">
    It is a warning
</div>
<div class="alert alert-info" role="alert">
    It is info
</div>

HTML
);
    }

    function it_uses_default_when_the_type_is_not_configured_in_the_class_name_suffix_map()
    {
        $notifications = new Notifications([
            new Notification('non-existing-type', 'With a message')
        ]);

        $this->render($notifications)->shouldBe(<<<HTML
<div class="alert alert-default" role="alert">
    With a message
</div>

HTML
);
    }

    /**
     * @return Notifications
     */
    private function createNotifications()
    {
        return new Notifications([
            Notification::success('It is successful'),
            Notification::error('It is an error'),
            Notification::warning('It is a warning'),
            Notification::info('It is info'),
        ]);
    }
}
