<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

return [
    'parent_menu' => 'global_menu_settings',
    'sort' => 1,
    'text' => Loc::getMessage('menu_section_text'),
    'items_id' => 'ramapriya_telegram',
    'items' => [
        [
            'text' => Loc::getMessage('menu_item_bot_list'),
            'url' => 'telegram_bot_list.php?lang='.LANGUAGE_ID
        ],
        [
            'text' => Loc::getMessage('menu_item_message_handler_list'),
            'url' => 'telegram_message_handler_list.php?lang='.LANGUAGE_ID
        ]
    ]
];