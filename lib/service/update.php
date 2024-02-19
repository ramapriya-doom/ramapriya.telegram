<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main\ORM\Objectify\EntityObject;
use Ramapriya\Telegram\Entity\BotTable;
use Ramapriya\Telegram\Entity\EO_Bot;
use Telegram\Bot\Api;

final class Update
{
    private Api $client;
    private EO_Bot|EntityObject $bot;

    public function __construct(private string $botName)
    {
        $this->init();
    }

    private function init()
    {
        $this->bot = BotTable::getByName($this->botName, [
            'select' => [
                'API_TOKEN',
                'NAME',
                'MESSAGE_HANDLERS.MESSAGE',
                'MESSAGE_HANDLERS.MODULE_ID',
                'MESSAGE_HANDLERS.HANDLER_CLASS',
            ],
        ])->fetchObject();

        $this->client = new Api($this->bot->getApiToken());
    }

    public function runHandlers(): void
    {
    }
}