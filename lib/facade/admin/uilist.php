<?php

namespace Ramapriya\Telegram\Facade\Admin;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Entity;

Loc::loadMessages(__FILE__);

abstract class UiList
{
    protected \CAdminUiList $uiList;
    protected DataManager|string $dataClass;
    protected Entity $entity;
    protected array $filterFields = [];
    protected array $filter = [];
    protected array $contextMenu = [];
    protected $showSettings = false;
    protected $showExcelExport = false;

    public function __construct(protected readonly string $id)
    {
        $this->uiList = new \CAdminUiList($id);
    }

    protected function fillContextMenu(): void
    {
    }

    protected function getDeleteAction($itemId): array
    {
        return [
            'ICON'    => 'delete',
            'TEXT'    => Loc::getMessage('action_delete'),
            'DEFAULT' => false,
            'ACTION'  => sprintf(
                'Telegram.deleteItem(\'%s\', %d)',
                $this->dataClass::getTableName(),
                $itemId
            )
        ];
    }

    abstract public function fillFilterFields();

    abstract public function fillHeaders();

    abstract public function fillRows();

    protected function addContextMenu(): void
    {
        if (!empty($this->contextMenu)) {
            $this->uiList->AddAdminContextMenu($this->contextMenu, $this->showExcelExport, $this->showSettings);
        }
    }

    public function render(): void
    {
        $this->fillFilterFields();
        $this->fillContextMenu();
        $this->addContextMenu();
        $this->fillHeaders();
        $this->fillRows();

        $this->uiList->DisplayFilter($this->filterFields);
        $this->uiList->DisplayList();
    }


}