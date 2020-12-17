<?php

namespace WooMaiLabs\TelegramBotAPI;

class CallbackQuery extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            if ($k == 'from') {
                $this->$k = new User($v);
            } else if ($k == 'message') {
                $this->$k = new Message($v);
            } else {
                $this->$k = $v;
            }
        }
    }
}