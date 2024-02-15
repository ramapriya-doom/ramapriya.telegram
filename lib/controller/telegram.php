<?php

namespace Ramapriya\Telegram\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Controller;
use Ramapriya\Telegram\Service\Update;


class Telegram extends Controller
{
    protected function getDefaultPreFilters(): array
    {
        return [
            new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_POST])
        ];
    }

    public function configureActions(): array
    {
        return [
            'getWebhookUpdates' => [
                '-prefilters' => [ActionFilter\Csrf::class]
            ]
        ];
    }

    public function getWebhookUpdatesAction(string $botName)
    {
        $service = new Update($botName);
        $service->runHandlers();
    }
}