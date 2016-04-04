<?php

namespace Rojtjo\Notifications;

class Notification
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $message;

    /**
     * @param string $type
     * @param string $message
     */
    public function __construct($type, $message)
    {
        $this->type = $type;
        $this->message = $message;
    }

    /**
     * @param string $message
     * @return Notification
     */
    public static function success($message)
    {
        return new Notification('success', $message);
    }

    /**
     * @param string $message
     * @return Notification
     */
    public static function error($message)
    {
        return new Notification('error', $message);
    }

    /**
     * @param string $message
     * @return Notification
     */
    public static function warning($message)
    {
        return new Notification('warning', $message);
    }

    /**
     * @param string $message
     * @return Notification
     */
    public static function info($message)
    {
        return new Notification('info', $message);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }
}
