<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Entity;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Result;
use Bitrix\Main\SystemException;
use Ramapriya\Telegram\Service\Webhook;

Loc::loadMessages(__FILE__);

class BotTable
    extends DataManager
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
                ->configureUnique()
                ->configureTitle(Loc::getMessage('api_token_field_title')),
            (new Fields\StringField('NAME'))
                ->configureRequired()
                ->configureUnique()
                ->configureTitle('Username'),
            (new Fields\StringField('WEBHOOK_CUSTOM_URL'))
                ->configureNullable()
                ->configureTitle(Loc::getMessage('webhook_custom_url_title'))
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

    /**
     * Удаление обработчиков входящих сообщений после удаления бота
     *
     * @param Bot $object
     * @param Entity $entity
     *
     * @return void
     *
     * @throws ArgumentException
     * @throws SystemException
     */
    protected static function callOnAfterDeleteEvent($object, $entity)
    {
        $handlers = MessageHandlerTable::getByBotId($object->getId())->fetchCollection();

        foreach ($handlers as $handler) {
            $handler->delete();
        }

        parent::callOnAfterDeleteEvent($object, $entity);
    }
}