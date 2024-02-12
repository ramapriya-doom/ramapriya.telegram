<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main\Context;
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
        $url = sprintf('http%s://%s/telegram/updates/%s',($request->isHttps() ? 's' : ''), $server->getServerName(), $this->botName);

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