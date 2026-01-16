<?php

namespace Ramapriya\Telegram\Client;

use Bitrix\Main\Error;
use Bitrix\Main\ObjectPropertyException;
use Bitrix\Main\Result;
use Bitrix\Main\Web\HttpClient;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\UriInterface;
use Ramapriya\Telegram\Contracts\Client\TelegramClientInterface;

/**
 * Клиент для непосредственной работы с Telegram API, использует функционал Bitrix Framework
 *
 * @uses \Psr\Http\Client\ClientInterface
 * @uses \Psr\Http\Message\UriInterface
 * @uses \Bitrix\Main\Web\HttpClient
 * @uses \Bitrix\Main\Web\Uri
 * @uses \Bitrix\Main\Result
 */
class TelegramClient implements TelegramClientInterface
{
    private Result $result;
    private ClientInterface $client;
    private ?UriInterface $uri = null;

    public function __construct(private readonly string $token)
    {
        $this->client = new HttpClient();
        $this->result = new Result();
    }

    public function setUri(UriInterface $uri): static
    {
        $this->uri = $uri;
        return $this;
    }

    public function preparePath(string $endpoint, bool $isFile = false): static
    {
        if ($this->uri === null) {
            throw new ObjectPropertyException('uri');
        }

        $path = sprintf('bot%s/%s', $this->token, $endpoint);
        if ($isFile) {
            $path = 'file/'.$path;
        }
        $this->uri = $this->uri->withPath($path);
        return $this;
    }

    public function sendRequest(string $method = 'GET'): static
    {
        $result = $this->client->query($method, $this->uri);

        if (!$result) {
            $error = $this->client->getError();
            foreach ($error as $code => $message) {
                $this->result->addError(new Error($message, $code));
            }

            return $this;
        }

        $resultData = json_decode($this->client->getResult(), true);
        if (!$resultData['ok']) {
            $this->result->addError(new Error($resultData['description'], $resultData['error_code']));
            return $this;
        }

        $this->result->setData($resultData);
        return $this;
    }

    public function getResult(): Result
    {
        return $this->result;
    }
}