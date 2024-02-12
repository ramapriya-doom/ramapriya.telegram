<?php

namespace Ramapriya\Telegram\Service;

use Ramapriya\Telegram\Contracts\IOptions;
use Telegram\Bot\Api;
use Telegram\Bot\Api as Client;

class Service implements IOptions
{
    protected Client $telegram;

    public function __construct(protected string $apiToken, protected string $botName)
    {
        $this->telegram = new Api($apiToken);
    }

    public function telegram(): Client
    {
        return $this->telegram;
    }
}