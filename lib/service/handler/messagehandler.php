<?php

namespace Ramapriya\Telegram\Service\Handler;

use Ramapriya\Telegram\Contracts\Service\Handler\MessageHandlerInterface;
use Ramapriya\Telegram\Contracts\Service\Handler\MessageParamsInterface;
use Telegram\Bot\Api;
use Telegram\Bot\Keyboard\Keyboard;
use Telegram\Bot\Objects\Update;

abstract class MessageHandler implements MessageHandlerInterface, MessageParamsInterface
{
    protected Update        $update;
    protected Keyboard|null $keyboard = null;

    protected array $messageParams  = [];
    protected bool  $canUseKeyboard = false;

    public function __construct(protected Api $client)
    {
        $this->update = $this->client->getWebhookUpdate();
    }

    //region MessageParamsInterface

    public function fillMessageParams(): static
    {
        $this->messageParams = [
            'chat_id' => $this->getChatId(),
            'text'    => $this->getMessageText(),
        ];

        if ($this->canUseKeyboard()) {
            $this->messageParams['reply_markup'] = $this->getKeyboard();
        }

        return $this;
    }

    public function fillKeyboard(): static
    {
        $this->canUseKeyboard = true;
        $this->keyboard       = new Keyboard();
        return $this; // TODO: При необходимости переопределить.
    }

    public function getClient(): Api
    {
        return $this->client;
    }

    public function getChatId(): int
    {
        return $this->update->message->from->id;
    }

    public function getMessageParams(): array
    {
        return $this->messageParams;
    }

    public function canUseKeyboard(): bool
    {
        return $this->canUseKeyboard;
    }

    public function getKeyboard(): ?Keyboard
    {
        return $this->keyboard;
    }

    //endregion
}