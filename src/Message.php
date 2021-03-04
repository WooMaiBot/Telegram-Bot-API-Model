<?php

namespace WooMaiLabs\TelegramBotAPI\Models;

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
                case 'via_bot':
                    $this->$k = new User($v);
                    break;

                case 'new_chat_members':
                    $this->$k = [];
                    foreach ($v as $nm) {
                        $this->$k[] = new User($nm);
                    }
                    break;

                case 'reply_to_message':
                case 'pinned_message':
                    $this->$k = new Message($v);
                    break;

                case 'chat':
                case 'sender_chat':
                case 'forward_from_chat':
                    $this->$k = new Chat($v);
                    break;

                case 'sticker':
                    $this->$k = new Sticker($v);
                    break;

                case 'location':
                    $this->$k = new Location($v);
                    break;

                case 'entities':
                    $this->$k = [];
                    foreach ($v as $e) {
                        $this->$k[] = new MessageEntity($e);
                    }
                    break;

                case 'photo':
                case 'new_chat_photo':
                    $this->$k = [];
                    foreach ($v as $e) {
                        $this->$k[] = new PhotoSize($e);
                    }
                    break;

                case 'animation':
                    $this->$k = new Animation($v);
                    break;

                case 'audio':
                    $this->$k = new Audio($v);
                    break;

                case 'document':
                    $this->$k = new Document($v);
                    break;

                case 'video':
                    $this->$k = new Video($v);
                    break;

                case 'video_note':
                    $this->$k = new VideoNote($v);
                    break;

                case 'voice':
                    $this->$k = new Voice($v);
                    break;

                case 'contact':
                    $this->$k = new Contact($v);
                    break;

                case 'dice':
                    $this->$k = new Dice($v);
                    break;

                case 'game':
                    $this->$k = new Game($v);
                    break;

                case 'poll':
                    $this->$k = new Poll($v);
                    break;

                case 'venue':
                    $this->$k = new Venue($v);
                    break;

                case 'invoice':
                    $this->$k = new Invoice($v);
                    break;

                case 'successful_payment':
                    $this->$k = new SuccessfulPayment($v);
                    break;

                case 'passport_data':
                    $this->$k = new PassportData($v);
                    break;

                case 'proximity_alert_triggered':
                    $this->$k = new ProximityAlertTriggered($v);
                    break;

                case 'reply_markup':
                    $this->$k = new InlineKeyboardMarkup($v);
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
