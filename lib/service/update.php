<?php

namespace Ramapriya\Telegram\Service;

use Telegram\Bot\Api;

final class Update
{
    private Api $client;

    public function __construct(private string $botName)
    {
        $this->init();
    }

    private function init()
    {

    }

    public function runHandlers(): void
    {
    }
}