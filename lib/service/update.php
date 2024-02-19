<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main\NotImplementedException;
use Bitrix\Main\ORM\Objectify\Collection;
use Bitrix\Main\ORM\Objectify\EntityObject;
use Ramapriya\Telegram\Contracts\Service\Handler\MessageHandlerInterface;
use Ramapriya\Telegram\Entity\BotTable;
use Ramapriya\Telegram\Entity\EO_Bot;
use Ramapriya\Telegram\Entity\EO_MessageHandler_Collection;
use Ramapriya\Telegram\Entity\MessageHandlerTable;
use Telegram\Bot\Api;

final class Update
{
    private Api                                     $client;
    private EO_MessageHandler_Collection|Collection $messageHandlers;

    public function __construct(private string $botName)
    {
        $this->init();
    }

    private function init()
    {
        $bot                   = BotTable::getByName($this->botName)->fetchObject();
        $this->client          = new Api($bot->getApiToken());
        $this->messageHandlers = MessageHandlerTable::getByBotId($bot->getId())->fetchCollection();

    }

    public function runHandlers(): void
    {
        foreach ($this->messageHandlers as $messageHandler) {
            $handlerClass = $messageHandler->getHandlerClass();
            $handler      = new $handlerClass($this->client);

            if (!($handler instanceof MessageHandlerInterface)) {
                throw new NotImplementedException(sprintf('Class %s must be implemented from %s', $handlerClass, MessageHandlerInterface::class));
            }

            $handler->handleMessage();
        }
    }
}