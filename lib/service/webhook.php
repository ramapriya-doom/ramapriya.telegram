<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main\Context;
use Bitrix\Main\Request;
use Bitrix\Main\Server;
use Telegram\Bot\Exceptions\TelegramSDKException;

class Webhook extends Service
{
    private Request $request;
    private Server $server;
    private ?string $webhookUrl = null;

    public function __construct(string $apiToken, string $botName)
    {
        $this->request = Context::getCurrent()->getRequest();
        $this->server = $this->request->getServer();

        parent::__construct($apiToken, $botName);

        $this->setDefaultWebhookUrl();
    }

    private function setDefaultWebhookUrl()
    {
        $this->webhookUrl = sprintf(
            'http%s://%s/telegram/updates/%s',
            ($this->request->isHttps() ? 's' : ''),
            $this->server->getServerName(),
            $this->botName
        );
    }

    public function setCustomWebhookUrl(string $webhookUrl): static
    {
        $this->webhookUrl = $webhookUrl;
        return $this;
    }

    /**
     * @return array
     * @throws TelegramSDKException
     */
    public function setWebhook(): array
    {
        if (!$this->webhookUrl) {
            throw new TelegramSDKException('Webhook url not defined');
        }

        $this->telegram->deleteWebhook();
        $result = $this->telegram->setWebhook([
            'url' => $this->webhookUrl
        ]);

        return [
            'result' => $result,
            'info' => $this->telegram->getWebhookInfo()->toArray()
        ];
    }
}