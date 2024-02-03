<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main\Config\Option;
use Bitrix\Main\Context;
use Bitrix\Main\DI\ServiceLocator;
use Iskkon\Berdsk\Options;
use Ramapriya\Telegram\Builder\TelegramBuilder;
use Ramapriya\Telegram\Contracts\IOptions;
use Telegram\Bot\Api as Telegram;
use Telegram\Bot\Exceptions\TelegramSDKException;

class Webhook extends Service
{

    /**
     * @return array
     * @throws TelegramSDKException
     */
    public function setWebhook(): array
    {
        $request = Context::getCurrent()->getRequest();
        $server = $request->getServer();
        $url = sprintf('http%s://%s/telegram/updates',($request->isHttps() ? 's' : ''), $server->getServerName());

        $this->telegram->deleteWebhook();
        $result = $this->telegram->setWebhook([
            'url' => $url
        ]);

        return [
            'result' => $result,
            'message' => 'Вебхук успешно установлен',
            'info' => $this->telegram->getWebhookInfo()->toArray()
        ];
    }
}