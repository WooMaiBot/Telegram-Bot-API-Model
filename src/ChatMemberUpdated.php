<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

class ChatMemberUpdated extends BasicType
{
    public function __construct(object $object)
    {
        foreach ($object as $k => $v) {
            switch ($k) {
                case 'chat':
                    $this->$k = new Chat($v);
                    break;

                case 'from':
                    $this->$k = new User($v);
                    break;

                case 'old_chat_member':
                case 'new_chat_member':
                    $this->$k = new ChatMember($v);
                    break;

                default:
                    $this->$k = $v;
            }
        }
    }
}
