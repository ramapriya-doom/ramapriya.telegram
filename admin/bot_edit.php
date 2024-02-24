<?php

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Ramapriya\Telegram\Entity\BotTable;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin.php';

/**
 * @global CMain $APPLICATION
 */

Loc::loadMessages(__FILE__);
Loader::includeModule('ramapriya.telegram');

$APPLICATION->SetTitle(Loc::getMessage('add_new_bot_title'));
$request = Context::getCurrent()->getRequest();

if ($request['save'] && check_bitrix_sessid()) {
    BotTable::add([
        'API_TOKEN'          => $request['API_TOKEN'],
        'NAME'               => str_ireplace('@', '', $request['NAME']),
        'WEBHOOK_CUSTOM_URL' => $request['WEBHOOK_CUSTOM_URL']
    ]);
    LocalRedirect('/bitrix/admin/telegram_bot_list.php?lang=' . LANGUAGE_ID);
}


$tabs = [
    [
        'DIV' => 'edit1',
        'TAB' => Loc::getMessage('tab_new_bot')
    ]
];

$tabControl = new CAdminTabControl('tabControl', $tabs);
$tabControl->Begin();

?>
    <form action="<?= $request->getRequestUri() ?>" method="post">

        <?php
        echo bitrix_sessid_post();
        $tabControl->BeginNextTab();
        ?>

        <tr>
            <td width="40%"><?= Loc::getMessage('label_api_token') ?></td>
            <td width="60%"><input type="text" required name="API_TOKEN"></td>
        </tr>
        <tr>
            <td width="40%"><?= Loc::getMessage('label_name') ?></td>
            <td width="60%"><input type="text" required name="NAME"></td>
        </tr>
        <tr>
            <td width="40%"><?= Loc::getMessage('label_webhook_custom_url') ?></td>
            <td width="60%"><input type="text" name="WEBHOOK_CUSTOM_URL"></td>
        </tr>

        <?php
        $tabControl->EndTab();
        $tabControl->Buttons([
            'back_url' => '/bitrix/admin/telegram_bot_list.php?lang' . LANGUAGE_ID
        ]);
        ?>

    </form>
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php';