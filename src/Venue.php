<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class Venue extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'location':
                    $this->$k = new Location($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
