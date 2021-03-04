<?php

namespace WooMaiLabs\TelegramBotAPI;

class Sticker extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'thumb':
                    $this->$k = new PhotoSize($v);
                    break;

                case 'mask_position':
                    $this->$k = new MaskPosition($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
