<?php

namespace WooMaiLabs\TelegramBotAPI;

use Psr\Http\Message\RequestInterface;

class Update
{
    public function __construct(RequestInterface $request)
    {
        $raw = $request->getBody()->read(10 * 1024 * 1024 * 1024);  // 10 MiB
        $update = json_decode($raw);
        if (!is_object($update)) {
            throw new \Exception('Malformed JSON in Request Body');
        }

        foreach ($update as $k => $v) {
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

                default:
                    $this->$k = $v;
            }
        }
    }
}
