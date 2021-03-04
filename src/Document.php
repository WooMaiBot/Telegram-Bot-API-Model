<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class Document extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'thumb':
                    $this->$k = new PhotoSize($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}