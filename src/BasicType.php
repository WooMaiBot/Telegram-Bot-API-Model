<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            $this->$k = $v;
        }
    }
}
