<?php

namespace WooMaiLabs\TelegramBotAPI;

class User
{
    public function __construct($user)
    {
        foreach ($user as $k => $v) {
            $this->$k = $v;
        }
    }

    public function getCall($limit = 0)
    {
        $call = $this->first_name;
        if (isset($this->last_name)) {
            $call .= ' ' . $this->last_name;
        }

        if ($limit > 0 && mb_strlen($call) > $limit) {
            $call = mb_substr($call, 0, $limit);
            $call .= '...';
        }

        return $call;
    }
}
