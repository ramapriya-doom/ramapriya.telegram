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

    public function __construct(private ?string $token = null, private bool $useAsyncRequest = false)
    {
        if (!$this->token) {
            $this->token = Option::get(self::MODULE_ID, self::BOT_API_TOKEN);
        }

        if (!$this->token) {
            throw new \Exception('Сохраните токен в базе, прежде чем устанавливать вебхук');
        }

        if (!$this->useAsyncRequest) {
            $this->useAsyncRequest = Option::get(self::MODULE_ID, self::USE_ASYNC_REQUEST) === 'Y';
        }

        $this->telegram = new Api($this->token, $this->useAsyncRequest);
    }

    public static function create(bool $replaceCommandByName = false): Telegram
    {
        $instance = new self();

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