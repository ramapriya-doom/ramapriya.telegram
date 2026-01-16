<?php

namespace Ramapriya\Telegram\Service\Adapter;

use Bitrix\Main\Result;
use Bitrix\Main\Web\Uri;
use Psr\Http\Message\UriInterface;
use Ramapriya\Telegram\Client\TelegramClient;
use Ramapriya\Telegram\Contracts\Client\TelegramClientInterface;
use Ramapriya\Telegram\Contracts\Service\TelegramInterface;

class DefaultTelegramAdapter implements TelegramInterface
{
    private Result $result;
    private TelegramClientInterface $client;
    private UriInterface $uri;

    public function __construct(private string $botToken, private string $botApiUrl = 'https://api.telegram.org/')
    {
        $this->result = new Result();
        $this->client = new TelegramClient($this->botToken);
        $this->uri = new Uri($this->botApiUrl);
    }

    public function getBotToken(): string
    {
        return $this->botToken;
    }

    public function sendMessage(array $params): Result
    {
        $this->uri->addParams($params);
        return $this->client
            ->setUri($this->uri)
            ->preparePath('sendMessage')
            ->sendRequest('POST')
            ->getResult();
    }

    public function getMe(): Result
    {
        $data = $this->client
            ->setUri($this->uri)
            ->preparePath('getMe')
            ->sendRequest()
            ->getResult()
            ->getData();

        $this->result->setData($data['result']);
        return $this->result;
    }

    public function getFile(string $fileId): Result
    {
        $this->uri->addParams(['file_id' => $fileId]);
        return $this->client
            ->setUri($this->uri)
            ->preparePath('getFile')
            ->sendRequest()
            ->getResult();
    }

    public function getWebhookInfo(): Result
    {
        return $this->client
            ->setUri($this->uri)
            ->preparePath('getWebhookInfo')
            ->sendRequest()
            ->getResult();
    }

    public function setWebhook(array $params): Result
    {
        $this->uri->addParams($params);
        return $this->client
            ->setUri($this->uri)
            ->preparePath('setWebhook')
            ->sendRequest('POST')
            ->getResult();
    }

    public function deleteWebhook(): Result
    {
        return $this->client
            ->setUri($this->uri)
            ->preparePath('deleteWebhook')
            ->sendRequest('POST')
            ->getResult();
    }
}