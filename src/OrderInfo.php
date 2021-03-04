<?php

namespace WooMaiLabs\TelegramBotAPI;

class OrderInfo extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'shipping_address':
                    $this->$k = new ShippingAddress($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
