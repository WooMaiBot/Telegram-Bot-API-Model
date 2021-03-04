<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class InlineKeyboardButton extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'login_url':
                    $this->$k = new LoginUrl($v);
                    break;

                    //  A placeholder, currently holds no information. Use BotFather to set up your game.
                    //case 'callback_game':
                    //    $this->$k = new CallbackGame($v);
                    //    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
