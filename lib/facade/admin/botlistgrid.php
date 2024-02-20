<?php

namespace Ramapriya\Telegram\Facade\Admin;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\SystemException;
use Ramapriya\Telegram\Entity\BotTable;

class BotListGrid extends Grid
{
    protected array $enabledParams = [
        'ALLOW_HORIZONTAL_SCROLL',
        'ALLOW_COLUMNS_RESIZE',
        'SHOW_GRID_SETTINGS_MENU',
    ];

    protected array $disabledParams = [
        'SHOW_ROW_CHECKBOXES',
        'SHOW_CHECK_ALL_CHECKBOXES',
        'SHOW_ROW_ACTIONS_MENU',
        'SHOW_NAVIGATION_PANEL',
        'SHOW_SELECTED_COUNTER',
    ];

    /**
     * @throws SystemException
     * @throws ArgumentException
     */
    public function __construct(string $id = 'telegram_bot_list')
    {
        parent::__construct($id);
        $this->dataClass = BotTable::class;
        $this->query = BotTable::query();
    }

    public function fillColumns(): void
    {
        $fields = BotTable::getEntity()->getFields();

        foreach ($fields as $field) {
            $this->columns[] = [
                'id' => $field->getName(),
                'name' => $field->getName() === 'ID' ? $field->getName() : $field->getTitle(),
                'sort' => $field->getName(),
                'default' => true,
                'editable' => false
            ];
        }
    }

    public function fillRows(): void
    {
        $this->fillQuery();

        $collection = $this->query->exec()->fetchCollection();

        foreach ($collection as $object) {
            $this->rows[] = [
                'id' => $object->getId(),
                'columns' => [
                    'ID'=> $object->getId(),
                    'API_TOKEN' => $object->getApiToken(),
                    'NAME' => print_url(
                        sprintf('https://t.me/%s', $object->getName()),
                        sprintf('@%s', $object->getName()),
                        'target="_blank"'
                    )
                ]
            ];
        }
    }

    public function fillParams(): void
    {
        $this->params = [
            'GRID_ID'             => $this->getId(),
            'COLUMNS'             => $this->getColumns(),
            'ROWS'                => $this->getRows(),
            'AJAX_MODE'           => 'Y',
            'AJAX_OPTION_JUMP'    => 'N',
            'AJAX_OPTION_HISTORY' => 'N',
        ];

        foreach ($this->enabledParams as $enabledParam) {
            $this->params[$enabledParam] = true;
        }

        foreach ($this->disabledParams as $disabledParam) {
            $this->params[$disabledParam] = false;
        }
    }
}