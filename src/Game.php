<?php

namespace WooMaiLabs\TelegramBotAPI;

class Game extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'photo':
                    $this->$k = [];
                    foreach ($v as $e) {
                        $this->$k[] = new PhotoSize($e);
                    }
                    break;

                case 'text_entities':
                    $this->$k = [];
                    foreach ($v as $e) {
                        $this->$k[] = new MessageEntity($e);
                    }
                    break;

                case 'animation':
                    $this->$k = new Animation($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
