<?php

namespace Ramapriya\Telegram\Builder;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Event;
use Ramapriya\Telegram\Contracts\Builder\ITelegramBuilder;
use Ramapriya\Telegram\Contracts\IModule;
use Ramapriya\Telegram\Contracts\IOptions;
use Telegram\Bot\Api;
use Telegram\Bot\Api as Telegram;

class TelegramBuilder implements ITelegramBuilder, IModule, IOptions
{
    private Telegram $telegram;

    private function __construct(private string $token, private bool $useAsyncRequest)
    {
        $this->telegram = new Api($this->token, $this->useAsyncRequest);
    }

    public static function create(bool $replaceCommandByName = false): Telegram
    {
        $token = Option::get(self::MODULE_ID, self::BOT_API_TOKEN);
        $useAsyncRequest = Option::get(self::MODULE_ID, self::USE_ASYNC_REQUEST) === 'Y';

        $instance = new self($token, $useAsyncRequest);

        $instance->registerCommands($replaceCommandByName);
        return $instance->getTelegram();
    }

    public function getTelegram(): Telegram
    {
        return $this->telegram;
    }

    public function registerCommands(bool $replaceByName = false): static
    {
        $event = new Event(self::MODULE_ID, 'onBeforeRegisterCommand');
        $event->send();
        return $this;
    }
}