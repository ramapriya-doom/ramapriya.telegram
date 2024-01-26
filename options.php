<?php

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\UI\Extension;

$request  = Context::getCurrent()->getRequest();
$moduleId = $request['mid'] ?? 'ramapriya.telegram';

Loader::includeModule($moduleId);
Extension::load('ui.buttons');
Asset::getInstance()->addJs('/local/modules/telegram/js/telegram.js');

$booleanValues = [
    ''  => '',
    'Y' => 'Да',
    'N' => 'Нет',
];

$tabs = [
    [
        'DIV'     => 'connection',
        'TAB'     => 'Подключение',
        'TITLE'   => 'Настройки подключения',
        'OPTIONS' => [
            [
                'bot_api_token',
                'Токен бота',
                '',
                ['password', 50],
            ],
            [
                '',
                '',
                '<button onclick="setWebhook(event)" class="ui-btn ui-btn-primary">Установить вебхук</button>',
                ['statichtml'],
            ],
            [
                'use_async_requests',
                'Использовать асинхронные запросы',
                '',
                ['selectbox', $booleanValues],
            ],
        ],
    ],
    [
        'DIV'     => 'notifications',
        'TAB'     => 'Уведомления',
        'TITLE'   => 'Настройки уведомлений',
        'OPTIONS' => [
            [
                'notification_time',
                'Время отправления уведомлений (часы:минуты)',
                '09:00',
                ['text',6],
            ],
        ],
    ],
];

$options    = array_column($tabs, 'OPTIONS');

if (check_bitrix_sessid() && $request['save']) {
    foreach ($options as $item) {
        foreach ($item as $option) {
            __AdmSettingsSaveOption($moduleId, $option);
        }
    }
}

$tabControl = new CAdminTabControl('tabControl', $tabs);
$tabControl->Begin();

?>

<form action="<?= $request->getRequestUri() ?>" method="post">

    <?php
    foreach ($options as $option) {
        $tabControl->BeginNextTab();
        __AdmSettingsDrawList($moduleId, $option);
    }

    $tabControl->Buttons([
        'btnApply'      => false,
        'btnCancel'     => false,
        'btnSaveAndAdd' => false,
    ]);
    echo bitrix_sessid_post();
    $tabControl->End();

    ?>

</form>

