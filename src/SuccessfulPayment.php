<?php

namespace WooMaiLabs\TelegramBotAPI;

class SuccessfulPayment extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'order_info':
                    $this->$k = new OrderInfo($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}