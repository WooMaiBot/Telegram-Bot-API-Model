<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class InlineKeyboardMarkup extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'inline_keyboard':
                    $this->$k = [];
                    foreach ($v as $i) {
                        $tmp = [];
                        foreach ($i as $i2) {
                            $tmp[] = new InlineKeyboardButton($v);
                        }
                        $this->$k[] = $tmp;
                    }
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
