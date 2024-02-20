<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Ramapriya\Telegram\Facade\Admin\BotListGrid;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin.php';

/**
 * @global CMain $APPLICATION
 */

Loc::loadMessages(__DIR__ . '/menu.php');
Loader::includeModule('ramapriya.telegram');

$APPLICATION->SetTitle(Loc::getMessage('menu_item_bot_list'));
$grid = new BotListGrid();

$params = [
    'select' => ['ID', 'API_TOKEN', 'NAME', 'WEBHOOK_CUSTOM_URL']
];

$grid->setOrmParams($params);
$grid->fillColumns();
$grid->fillRows();
$grid->fillParams();

$APPLICATION->IncludeComponent('bitrix:main.ui.grid', '', $grid->getParams());

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php';