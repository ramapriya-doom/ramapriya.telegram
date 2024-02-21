<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main\Loader;
use Bitrix\Main\NotImplementedException;
use Bitrix\Main\SystemException;
use Ramapriya\Telegram\Contracts\Service\Handler\MessageHandlerInterface;
use Ramapriya\Telegram\Entity\MessageHandlerTable;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

final class Update
{
    public function __construct(private readonly string $botName)
    {
    }

    /**
     *
     * @return void
     *
     * @throws NotImplementedException
     * @throws TelegramSDKException
     * @throws SystemException
     */
    public function runHandlers(): void
    {
        $messageHandlers = MessageHandlerTable::getByBotName($this->botName, [
            'select' => [
                'MESSAGE',
                'MODULE_ID',
                'HANDLER_CLASS',
                'BOT.API_TOKEN',
                'BOT.NAME'
            ]
        ])->fetchCollection();

        foreach ($messageHandlers as $messageHandler) {
            $client = new Api($messageHandler->getBot()->getApiToken());
            $handlerClass = $messageHandler->getHandlerClass();

            if ($messageHandler->hasModuleId()) {
                Loader::includeModule($messageHandler->getModuleId());
            }

            $handler = new $handlerClass($client);

            if (!($handler instanceof MessageHandlerInterface)) {
                throw new NotImplementedException(
                    sprintf('Class %s must be implemented from %s', $handlerClass, MessageHandlerInterface::class)
                );
            }

            $handler->handleMessage();
        }
    }
}