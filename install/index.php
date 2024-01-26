<?php

use Bitrix\Main\Config\Configuration;
use Bitrix\Main\IO;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

class ramapriya_telegram extends CModule
{
    public $MODULE_ID = 'ramapriya.telegram';

    public function __construct()
    {
        $this->MODULE_NAME = Loc::getMessage('ramapriya_telegram_module_name');
    }

    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->installRoutes();
    }

    public function DoUninstall()
    {
        $this->uninstallRoutes();

        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function installRoutes()
    {
        CopyDirFiles(__DIR__ . '/telegram', $_SERVER['DOCUMENT_ROOT'] . '/telegram', true, true);
        CopyDirFiles(__DIR__ . '/routes', $_SERVER['DOCUMENT_ROOT'] . '/local/routes', true, true);

        $config = Configuration::getValue('routing');
        $config['config'][] = 'telegram.php';

        Configuration::setValue('routing', $config);
    }

    public function uninstallRoutes()
    {
        $config = Configuration::getValue('routing');

        foreach ($config['config'] as $i => $route) {
            if ($route !== 'telegram.php') {
                continue;
            }

            unset($config['config'][$i]);
        }

        Configuration::setValue('routing', $config);
        IO\File::deleteFile($_SERVER['DOCUMENT_ROOT'] . '/local/routes/telegram.php');
        IO\Directory::deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/telegram');
    }
}
