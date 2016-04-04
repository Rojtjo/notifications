<?php

namespace Rojtjo\Notifier;

interface Presenter
{
    /**
     * @param Notifications $notifications
     * @return string
     */
    public function render(Notifications $notifications);
}
