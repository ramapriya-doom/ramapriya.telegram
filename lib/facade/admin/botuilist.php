<?php

namespace Ramapriya\Telegram\Facade\Admin;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Page\Asset;
use Bitrix\Main\UI\Filter\FieldAdapter;
use Ramapriya\Telegram\Entity\BotTable;
use Ramapriya\Telegram\Helper\ModuleHelper;
use Ramapriya\Telegram\Service\Webhook;

Loc::loadMessages(__DIR__ . '/botlistgrid.php');
Loc::loadMessages(__FILE__);

class BotUiList extends UiList
{
    public function __construct(string $id)
    {
        parent::__construct($id);
        $this->dataClass = BotTable::class;
        $this->entity    = $this->dataClass::getEntity();
        $this->initJs();
    }

    private function initJs()
    {
        $js = ModuleHelper::getModulePath(false) . '/js/telegram.js';
        Asset::getInstance()->addJs($js);
    }

    public function fillFilterFields(): void
    {
        foreach ($this->entity->getFields() as $field => $fieldObject) {
            $this->filterFields[] = [
                'id'      => $field,
                'name'    => match ($fieldObject->getName()) {
                    'ID'                 => $fieldObject->getName(),
                    'WEBHOOK_CUSTOM_URL' => Loc::getMessage('webhook_custom_url'),
                    default              => $fieldObject->getTitle()
                },
                'type'    => $field === 'ID' ? FieldAdapter::NUMBER : FieldAdapter::STRING,
                'default' => true
            ];
        }

        $this->uiList->AddFilter($this->filterFields, $this->filter);
    }

    public function fillHeaders(): void
    {
        $headers = [];

        foreach ($this->entity->getFields() as $fieldName => $fieldObject) {
            $name = match ($fieldObject->getName()) {
                'ID'                 => $fieldObject->getName(),
                'WEBHOOK_CUSTOM_URL' => Loc::getMessage('webhook_custom_url'),
                default              => $fieldObject->getTitle(),
            };

            $headers[] = [
                'id'      => $fieldName,
                'content' => $name,
                'sort'    => $fieldName,
                'default' => true
            ];
        }

        $this->uiList->AddHeaders($headers);
    }

    public function fillRows()
    {
        $params = [
            'select' => ['ID', 'NAME', 'API_TOKEN', 'WEBHOOK_CUSTOM_URL']
        ];
        if ($this->filter) {
            $params['filter'] = $this->filter;
        }
        $result = $this->dataClass::getList($params);
        $data   = new \CAdminResult($result, $this->id);
        while ($element = $data->NavNext(strPrefix: 'f_')) {
            $service = new Webhook($element['API_TOKEN'], $element['NAME']);
            if (!$element['WEBHOOK_CUSTOM_URL']) {
                $element['WEBHOOK_CUSTOM_URL'] = $service->getWebhookUrl();
            }
            $row = $this->uiList->AddRow($element['ID'], $element);
            $row->AddViewField('NAME', print_url('https://t.me/' . $element['NAME'], '@' . $element['NAME']));
            $row->AddActions([
                $this->getDeleteAction($element['ID'])
            ]);
        }
    }

    protected function fillContextMenu(): void
    {
        $this->contextMenu[] = [
            'TEXT' => Loc::getMessage('button_add'),
            'LINK' => 'telegram_bot_edit.php?lang=' . LANGUAGE_ID,
            'ICON' => 'btn_new'
        ];
    }
}