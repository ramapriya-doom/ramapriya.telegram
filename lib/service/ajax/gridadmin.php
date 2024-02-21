<?php

namespace Ramapriya\Telegram\Service\Ajax;

use Bitrix\Main\ORM\Data\DataManager;
use Ramapriya\Telegram\Entity\BotTable;
use Ramapriya\Telegram\Entity\MessageHandlerTable;

class GridAdmin
{
    const ACTION_DELETE = 'delete';

    public function __construct(protected string $action, protected string $tableName, protected string $itemId)
    {
    }

    protected function getDataClassMap(): array
    {
        return [
            BotTable::getTableName() => BotTable::class,
            MessageHandlerTable::getTableName() => MessageHandlerTable::class
        ];
    }

    protected function getDataClass(): DataManager|string
    {
        $map = $this->getDataClassMap();
        return $map[$this->tableName];
    }

    protected function delete()
    {
        $dataClass = $this->getDataClass();
        return $dataClass::delete($this->itemId);
    }
}