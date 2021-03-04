<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class Chat extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'photo':
                    $this->$k = new ChatPhoto($v);
                    break;

                case 'pinned_message':
                    $this->$k = new Message($v);
                    break;

                case 'permissions':
                    $this->$k = ($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
