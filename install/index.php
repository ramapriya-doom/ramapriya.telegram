<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);
class ramapriya_telegram extends CModule
{
    public $MODULE_ID = 'ramapriya.telegram';

    private \Bitrix\Main\DB\Connection $connection;

    /**
     * @var array|\Bitrix\Main\ORM\Data\DataManager[]|string[]
     */
    private array $entities = [
        \Ramapriya\Telegram\Entity\User\UserTable::class,
        \Ramapriya\Telegram\Entity\Bot\BotTable::class,
        \Ramapriya\Telegram\Entity\Update\UpdateTable::class,
        \Ramapriya\Telegram\Entity\UserBot\UserBotTable::class,
    ];

    public function __construct()
    {
        $this->connection = \Bitrix\Main\Application::getConnection();

        $this->MODULE_NAME = 'Telegram';
        $this->MODULE_DESCRIPTION = Loc::getMessage('telegram_name');
    }

    public function DoInstall(): void
    {
        ModuleManager::registerModule($this->MODULE_ID);
        $this->InstallDB();
    }

    public function DoUninstall(): void
    {
        /**
         * Удаление таблиц не реализовано, т.к. пока не требуется
         */
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    public function InstallDB(): void
    {
        Loader::includeModule($this->MODULE_ID);

        foreach ($this->entities as $ent) {
            $entity = $ent::getEntity();
            $table = $entity->getDBTableName();

            if (!$this->connection->isTableExists($table)) {
                $entity->createDbTable();
            }
        }
    }
}