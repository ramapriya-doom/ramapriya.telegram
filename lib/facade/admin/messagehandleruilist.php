<?php

namespace Ramapriya\Telegram\Facade\Admin;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Fields\Relations\Reference;
use Bitrix\Main\UI\Filter\FieldAdapter;
use Ramapriya\Telegram\Entity\BotTable;
use Ramapriya\Telegram\Entity\MessageHandlerTable;

Loc::loadMessages(__FILE__);

class MessageHandlerUiList
    extends UiList
{
    public function __construct(string $id)
    {
        parent::__construct($id);
        $this->dataClass = MessageHandlerTable::class;
        $this->entity    = $this->dataClass::getEntity();
    }

    public function fillFilterFields()
    {
        $botListCollection = BotTable::getList()->fetchCollection();

        foreach ($this->entity->getFields() as $field) {
            if ($field instanceof Reference) {
                continue;
            }

            $isId = $field->getName() === 'ID';

            if ($field->getName() === 'BOT_ID') {
                $this->filterFields[] = [
                    'id'      => 'BOT.NAME',
                    'name'    => Loc::getMessage('bot_id'),
                    'type'    => FieldAdapter::LIST,
                    'default' => true,
                    'items'   => array_combine($botListCollection->fillName(), $botListCollection->fillName()),
                    'params'  => [
                        'multiple' => 'N'
                    ]
                ];
            } else {
                $this->filterFields[] = [
                    'id'      => $field->getName(),
                    'name'    => $isId ? $field->getName() : $field->getTitle(),
                    'type'    => $isId ? FieldAdapter::NUMBER : FieldAdapter::STRING,
                    'default' => !$isId
                ];
            }
        }

        $this->uiList->AddFilter($this->filterFields, $this->filter);
    }

    public function fillHeaders()
    {
        $headers = [];

        foreach ($this->entity->getFields() as $field) {
            if ($field instanceof Reference) {
                continue;
            }

            $headers[] = [
                'id'      => $field->getName(),
                'content' => match ($field->getName()) {
                    'ID'     => $field->getName(),
                    'BOT_ID' => Loc::getMessage('bot_id'),
                    default  => $field->getTitle()
                },
                'sort'    => $field->getName(),
                'default' => $field->getName() !== 'ID'
            ];
        }

        $this->uiList->AddHeaders($headers);
    }

    public function fillRows()
    {
        $params = [
            'select' => [
                'ID',
                'BOT_NAME' => 'BOT.ID',
                'MESSAGE',
                'MODULE_ID',
                'HANDLER_CLASS'
            ]
        ];

        if ($this->filter) {
            $params['filter'] = $this->filter;
        }

        $result = $this->dataClass::getList($params);
        $data   = new \CAdminResult($result, $this->id);

        while ($item = $data->NavNext(strPrefix: 'f_')) {
            $item['BOT_ID'] = $item['BOT_NAME'];
            unset($item['BOT_NAME']);
            $row = $this->uiList->AddRow($item['ID'], $item);
            $row->AddActions([$this->getDeleteAction($item['ID'])]);
        }
    }
}