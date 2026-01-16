<?php

namespace Ramapriya\Telegram\Service;

trait UpdateTrait
{
    public ?int $updateId = null;
    public bool $isMessage = false;
    public bool $isCallbackQuery = false;


    protected ?array $payload = null;
    protected ?array $from = null;
    protected ?string $text = null;
    protected ?string $callbackData = null;

    protected array $payloadTypeList = [
        'message',
        'edited_message',
        'channel_post',
        'edited_channel_post',
        'business_connection',
        'business_message',
        'edited_business_message',
        'deleted_business_messages',
        'message_reaction',
        'message_reaction_count',
        'inline_query',
        'chosen_inline_result',
        'callback_query',
        'shipping_query',
        'pre_checkout_query',
        'purchased_paid_media',
        'poll',
        'poll_answer',
        'my_chat_member',
        'chat_member',
        'chat_join_request',
        'chat_boost',
        'removed_chat_boost'
    ];

    public function parseUpdate(array $update): static
    {
        foreach ($update as $key => $value) {

            switch ($key) {
                case 'update_id':
                    $this->updateId = (int)$value;
                    break;
                case 'callback_query':
                    $this->isCallbackQuery = true;
                    break;
                    case 'message':
                        $this->isMessage = true;
                        break;
            }

            if (!in_array($key, $this->payloadTypeList)) {
                continue;
            }

            if (is_array($value)) {
                $this->payload = $value;
            }
            unset($key, $value);
        }

        if (is_array($this->payload)) {
            foreach ($this->payload as $key => $value) {
                if ($this->isCallbackQuery && $key === 'data') {
                    $this->callbackData = $value;
                    continue;
                }

                if (!property_exists($this, $key)) {
                    continue;
                }

                $this->$key = $value;
            }
        }

        return $this;
    }
}