<?php

use Bitrix\Main\Routing\RoutingConfigurator as Routes;
use Ramapriya\Telegram\Controller\Telegram;

return function (Routes $routes) {
    $routes
        ->prefix('telegram')
        ->group(function (Routes $routes) {
            $routes->post('updates/{botName}', [Telegram::class, 'getWebhookUpdatesAction']);
        });

};