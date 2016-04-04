<?php

namespace Rojtjo\Notifier\Presenters;

use Rojtjo\Notifier\Notification;
use Rojtjo\Notifier\Notifications;
use Rojtjo\Notifier\Presenter;

class BootstrapThreePresenter implements Presenter
{
    /**
     * @var array
     */
    private $classNameSuffixMap = [
        'success' => 'success',
        'error' => 'danger',
        'warning' => 'warning',
        'info' => 'info',
    ];

    /**
     * @param array $classNameSuffixMap
     */
    public function __construct(array $classNameSuffixMap = [])
    {
        $this->classNameSuffixMap = array_merge($this->classNameSuffixMap, $classNameSuffixMap);
    }

    /**
     * @param Notifications $notifications
     * @return string
     */
    public function render(Notifications $notifications)
    {
        $output = '';
        foreach ($notifications as $notification) {
            $output .= $this->renderNotification($notification);
        }

        return $output;
    }

    /**
     * @param Notification $notification
     * @return string
     */
    private function renderNotification(Notification $notification)
    {
        $classNameSuffix = $this->getClassNameSuffix($notification->getType());
        return <<<HTML
<div class="alert alert-{$classNameSuffix}" role="alert">
    {$notification->getMessage()}
</div>

HTML;
    }

    /**
     * @param string $type
     * @return string
     */
    private function getClassNameSuffix($type)
    {
        if (!isset($this->classNameSuffixMap[$type])) {
            return 'default';
        }

        return $this->classNameSuffixMap[$type];
    }
}
