<?php

use Bitrix\Main\Config\Option;
use Ramapriya\Telegram\Builder\TelegramBuilder;
use Ramapriya\Telegram\Contracts\IOptions;
use Telegram\Bot\Api;

return [
    'controllers' => [
        'value' => [
            'defaultNamespace' => '\\Ramapriya\\Telegram\\Controller'
        ],
        'readonly' => true,
    ],
    'services'    => [
        'value'    => [
            /**
             * Клиент для работы с API телеграм-бота
             */
            'telegram.client' => [
                'className' => Api::class,
                'constructorParams' => static function ()
                {
                    return [Option::get(IOptions::MODULE_ID, IOptions::BOT_API_TOKEN)];
                }
            ],
            'telegram.builder' => [
                'className' => TelegramBuilder::class,
                'constructor' => static function ()
                {
                    $builder = new TelegramBuilder();
                    $builder->registerCommands(true);
                    return $builder;
                }
            ]
        ],
        'readonly' => true
    ]
];