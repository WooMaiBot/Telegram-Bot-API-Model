<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class Update
{
    protected $attributes = [];

    public function __construct(object $update_object)
    {
        foreach ($update_object as $k => $v) {
            switch ($k) {
                case 'message':
                case 'edited_message':
                case 'channel_post':
                case 'edited_channel_post':
                    $this->$k = new Message($v);
                    break;

                case 'callback_query':
                    $this->$k = new CallbackQuery($v);
                    break;

                case 'inline_query':
                    $this->$k = new InlineQuery($v);
                    break;

                case 'chosen_inline_result':
                    $this->$k = new ChosenInlineResult($v);
                    break;

                case 'poll':
                    $this->$k = new Poll($v);
                    break;

                case 'poll_answer':
                case 'shipping_query':
                case 'pre_checkout_query':
                    // todo
                default:
                    $this->$k = $v;
            }
        }
    }

    public function withAttribute(string $name, $value)
    {
        $this->attributes[$name] = $value;
        return $this;
    }

    public function getAttribute(string $name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
    }

    public function withoutAttribute(string $name)
    {
        unset($this->attributes[$name]);
        return $this;
    }
}
