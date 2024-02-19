<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Result;
use Ramapriya\Telegram\Service\Webhook;

Loc::loadMessages(__FILE__);

class BotTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'telegram_bot';
    }

    public static function getObjectClass(): string
    {
        return Bot::class;
    }

    public static function getMap()
    {
        return [
            (new Fields\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new Fields\StringField('API_TOKEN'))
                ->configureRequired()
                ->configureUnique(),
            (new Fields\StringField('NAME'))
                ->configureRequired()
                ->configureUnique(),
            (new Fields\StringField('WEBHOOK_CUSTOM_URL'))
                ->configureNullable()
        ];
    }

    public static function getByName(string $name, array $params = []): Result
    {
        $params['filter']['=NAME'] = $name;
        return static::getList($params);
    }

    protected static function callOnAfterAddEvent($object, $fields, $id)
    {
        $service = new Webhook($fields['API_TOKEN'], $fields['NAME']);

        if (!empty($fields['WEBHOOK_CUSTOM_URL'])) {
            $service->setCustomWebhookUrl($fields['WEBHOOK_CUSTOM_URL']);
        }

        $service->setWebhook();

        parent::callOnAfterAddEvent($object, $fields, $id);
    }

    protected static function callOnBeforeUpdateEvent($object, $fields, $result)
    {
        throw new \Exception(Loc::getMessage('error_update_not_supports'));
    }
}