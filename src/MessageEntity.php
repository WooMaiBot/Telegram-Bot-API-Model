<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class MessageEntity extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'user':
                    $this->$k = new User($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
