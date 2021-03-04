<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class Poll extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'options':
                    $this->$k = [];
                    foreach ($v as $i) {
                        $this->$k[] = new PollOption($i);
                    }
                    break;

                case 'explanation_entities':
                    $this->$k = [];
                    foreach ($v as $e) {
                        $this->$k[] = new MessageEntity($e);
                    }
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}