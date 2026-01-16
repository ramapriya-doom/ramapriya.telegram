<?php

namespace Ramapriya\Telegram\Contracts\Client;

use Bitrix\Main\Result;
use Psr\Http\Message\UriInterface;

interface TelegramClientInterface
{
    public function setUri(UriInterface $uri): static;

    public function preparePath(string $endpoint, bool $isFile = false): static;

    public function sendRequest(string $method = 'GET'): static;

    public function getResult(): Result;
}