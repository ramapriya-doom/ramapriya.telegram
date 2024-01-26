<?php

use Ramapriya\Telegram\Builder\TelegramBuilder;
use Telegram\Bot\Api;

return [
    'controllers' => [
        'value' => [
            'defaultNamespace' => '\\Ramapriya\\Telegram\\Controller'
        ],
        'readonly' => true
    ],
    'services' => [
        'value' => [
            /**
             * Клиент для работы с API телеграм-бота
             */
            'telegram' => [
                'className' => Api::class,
                'constructor' => static function ()
                {
                    return TelegramBuilder::create(true);
                }
            ],
        ],
        'readonly' => true
    ]
];