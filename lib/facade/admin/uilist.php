<?php

namespace Ramapriya\Telegram\Facade\Admin;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Entity;
use Ramapriya\Telegram\Entity\EO_Bot_Entity;

abstract class UiList
{
    protected \CAdminUiList $uiList;
    protected DataManager|string $dataClass;
    protected EO_Bot_Entity|Entity $entity;
    protected array $initFilterFields = [];
    protected array $filterFields = [];
    protected array $filter = [];

    public function __construct(protected readonly string $id)
    {
        $this->uiList = new \CAdminUiList($id);
    }

    protected function initFilterFields(): void
    {
    }

    protected function getDeleteAction($itemId): array
    {
        return [
            'ICON' => 'delete',
            'TEXT' => 'Удалить',
            'DEFAULT' => false,
            'ACTION' => sprintf(
                'Telegram.deleteItem(\'%s\', %d)',
                $this->dataClass::getTableName(),
                $itemId
            )
        ];
    }

    abstract public function fillFilterFields();

    abstract public function fillHeaders();

    abstract public function fillRows();

    public function render(): void
    {
        $this->initFilterFields();
        $this->fillFilterFields();
        $this->fillHeaders();
        $this->fillRows();

        $this->uiList->DisplayFilter($this->filterFields);
        $this->uiList->DisplayList();
    }
}