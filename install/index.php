<?php

use Bitrix\Main\Config\Configuration;
use Bitrix\Main\Config\Option;
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
        $this->InstallDB();
        $this->installRoutes();
    }

    public function DoUninstall()
    {
        $this->uninstallRoutes();
        $this->UnInstallDB();

        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function InstallDB()
    {
    }

    public function UnInstallDB()
    {
        Option::delete($this->MODULE_ID);
    }

    public function installRoutes()
    {
        CopyDirFiles(__DIR__ . '/telegram', $_SERVER['DOCUMENT_ROOT'] . '/telegram', true, true);
        CopyDirFiles(__DIR__ . '/routes', $_SERVER['DOCUMENT_ROOT'] . '/local/routes', true, true);

        $configuration = Configuration::getInstance();
        $config = $configuration->get('routing');
        $config['config'][] = 'telegram.php';

        $configuration->addReadonly('routing', $config);
        $configuration->saveConfiguration();
    }

    public function uninstallRoutes()
    {
        $configuration = Configuration::getInstance();
        $config = $configuration->get('routing');

        foreach ($config['config'] as $i => $route) {
            if ($route !== 'telegram.php') {
                continue;
            }

            unset($config['config'][$i]);
        }

        $configuration->addReadonly('routing', $config);
        $configuration->saveConfiguration();

        IO\File::deleteFile($_SERVER['DOCUMENT_ROOT'] . '/local/routes/telegram.php');
        IO\Directory::deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/telegram');
    }
}
