<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Ramapriya\Telegram\Facade\Admin\BotUiList;

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_admin.php';

/**
 * @global CMain $APPLICATION
 */

Loc::loadMessages(__DIR__ . '/menu.php');
Loader::includeModule('ramapriya.telegram');

$APPLICATION->SetTitle(Loc::getMessage('menu_item_bot_list'));

$uiList = new BotUiList('telegram_bot_list');
$uiList->render();

require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/epilog_admin.php';