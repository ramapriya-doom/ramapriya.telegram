<?php

use Bitrix\Main\Application;
use Bitrix\Main\Config\Configuration;
use Bitrix\Main\Config\Option;
use Bitrix\Main\DB\Connection;
use Bitrix\Main\IO;
use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\ORM\Data\DataManager;
use Ramapriya\Telegram\Entity;

Loc::loadMessages(__FILE__);

class ramapriya_telegram extends CModule
{
    public $MODULE_ID = 'ramapriya.telegram';

    private Connection $connection;

    /**
     * @var DataManager[]|string[]
     */
    private array $orm = [
        Entity\BotTable::class,
        Entity\MessageHandlerTable::class
    ];
    private array $adminFiles = ['bot_list', 'bot_edit', 'message_handler_list', 'message_handler_edit'];

    public function __construct()
    {
        $this->MODULE_NAME = Loc::getMessage('ramapriya_telegram_module_name');

        $this->connection = Application::getConnection();
    }

    public function DoInstall()
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->InstallDB();
        $this->installRoutes();
        $this->installAdminFiles();
    }

    public function DoUninstall()
    {
        $this->uninstallAdminFiles();
        $this->uninstallRoutes();
        $this->UnInstallDB();

        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function InstallDB()
    {
        Loader::includeModule($this->MODULE_ID);

        foreach ($this->orm as $dataClass) {
            $entity = $dataClass::getEntity();
            $table = $entity->getDBTableName();

            if (!$this->connection->isTableExists($table)) {
                $entity->createDbTable();
            }
        }
    }

    public function UnInstallDB()
    {
        Option::delete($this->MODULE_ID);

        Loader::includeModule($this->MODULE_ID);

        foreach ($this->orm as $dataClass) {
            $table = $dataClass::getEntity()->getDBTableName();
            if ($this->connection->isTableExists($table)) {
                $this->connection->dropTable($table);
            }
        }
    }

    public function installRoutes()
    {
        CopyDirFiles(__DIR__ . '/telegram', $_SERVER['DOCUMENT_ROOT'] . '/telegram', true, true);
        CopyDirFiles(__DIR__ . '/routes', $_SERVER['DOCUMENT_ROOT'] . '/local/routes', true, true);

        $configuration = Configuration::getInstance();
        $config = $configuration->get('routing');
        if (!in_array('telegram.php', $config['config'])) {
            $config['config'][] = 'telegram.php';
            $configuration->addReadonly('routing', $config);
            $configuration->saveConfiguration();
        }
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

    private function getModulePath(bool $absolute = true): string
    {
        $moduleFolder = dirname(__DIR__);
        return !$absolute ? sprintf('/%s', str_ireplace(Loader::getDocumentRoot(), '', $moduleFolder)) : $moduleFolder;
    }

    public function installAdminFiles()
    {
        foreach ($this->adminFiles as $file) {
            $adminFilePath = sprintf(
                '%s/bitrix/admin/telegram_%s.php',
                Loader::getDocumentRoot(),
                $file
            );
            $content = sprintf(
                '<?php require_once $_SERVER["DOCUMENT_ROOT"] . "%s/%s.php";',
                $this->getModulePath(false),
                $file
            );

            IO\File::putFileContents($adminFilePath, $content);
        }
    }

    public function uninstallAdminFiles()
    {
        foreach ($this->adminFiles as $file) {
            $adminFilePath = sprintf(
                '%s/bitrix/admin/telegram_%s.php',
                Loader::getDocumentRoot(),
                $file
            );

            IO\File::deleteFile($adminFilePath);
        }
    }
}
