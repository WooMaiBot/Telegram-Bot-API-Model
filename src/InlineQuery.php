<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class InlineQuery extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'from':
                    $this->$k = new User($v);
                    break;

                case 'location':
                    $this->$k = new Location($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}