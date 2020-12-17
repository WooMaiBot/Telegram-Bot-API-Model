<?php

namespace WooMaiLabs\TelegramBotAPI;

class Message
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'from':
                case 'forward_from':
                case 'left_chat_member':
                case 'new_chat_participant':
                case 'new_chat_member':
                    $this->$k = new User($v);
                    break;

                case 'new_chat_members':
                    $arr = array();
                    foreach ($v as $index => $nm) {
                        $arr[$index] = new User($nm);
                    }
                    $this->$k = $arr;
                    break;

                case 'reply_to_message':
                case 'pinned_message':
                    $this->$k = new Message($v);
                    break;

                case 'chat':
                case 'forward_from_chat':
                    $this->$k = new Chat($v);
                    break;

                case 'sticker':
                    $this->$k = new Sticker($v);
                    break;

                case 'location':
                    $this->$k = new Location($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }

    public function getTextContent(): string
    {
        return $this->text ?? $this->caption ?? '';
    }

    public function getLinks()
    {
        
    }

    public function getParams(int $limit = 0)
    {
        
    }

    public function getCommand()
    {

    }

    public function getCommandAtUser()
    {
        
    }
}
