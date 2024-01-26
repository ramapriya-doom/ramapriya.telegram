<?php

namespace Ramapriya\Telegram\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Controller;


class Telegram extends Controller
{
    protected function getDefaultPreFilters(): array
    {
        return [
            new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_POST]),
            new ActionFilter\ContentType([ActionFilter\ContentType::JSON])
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

    public function setWebhookAction()
    {
        
    }

    public function getWebhookUpdatesAction()
    {
    }
}