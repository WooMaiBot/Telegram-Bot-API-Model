<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class ProximityAlertTriggered extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'traveler':
                case 'watcher':
                    $this->$k = new User($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
