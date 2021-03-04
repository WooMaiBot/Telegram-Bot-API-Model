<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class CallbackQuery extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'from':
                    $this->$k = new User($v);
                    break;

                case 'message':
                    $this->$k = new Message($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
