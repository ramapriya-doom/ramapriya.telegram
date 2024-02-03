<?php

namespace Ramapriya\Telegram\Service;

use Ramapriya\Telegram\Builder\TelegramBuilder;
use Ramapriya\Telegram\Contracts\IOptions;
use Telegram\Bot\Api as Client;

class Service implements IOptions
{
    protected Client $telegram;

    public function __construct()
    {
        $this->telegram = TelegramBuilder::create();
    }

    public function telegram(): Client
    {
        return $this->telegram;
    }
}