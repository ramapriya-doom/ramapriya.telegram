<?php

namespace Ramapriya\Telegram\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Controller;
use Ramapriya\Telegram\Service\Update;
use Ramapriya\Telegram\Service\Webhook;


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

    public function setWebhookAction(): bool|array
    {
        return (new Webhook())->setWebhook();
    }

    public function getWebhookUpdatesAction()
    {
        (new Update())->handleUpdates();
    }
}