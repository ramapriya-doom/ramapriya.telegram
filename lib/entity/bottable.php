<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\ArgumentException;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\NotSupportedException;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Data\DeleteResult;
use Bitrix\Main\ORM\Entity;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Result;
use Bitrix\Main\SystemException;
use Ramapriya\Telegram\Service\Webhook;
use Telegram\Bot\Api;

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

    public static function update($primary, array $data)
    {
        throw new NotSupportedException(Loc::getMessage('error_update_not_supports'));
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

    /**
     * Удаление вебхука перед удалением бота
     * @param $object
     * @param $entity
     * @param $result
     * @return void
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    protected static function callOnBeforeDeleteEvent($object, $entity, $result)
    {
        /**
         * @var Bot $object
         * @var Entity $entity
         * @var DeleteResult $result
         */
        $object = self::getById($object->getId())->fetchObject();
        dd($object);
        $client = new Api($object->getApiToken());
        $deleteWebhook = $client->deleteWebhook();

        if ($deleteWebhook) {
            $result->setData([
                'webhook_deleted' => $deleteWebhook
            ]);
        }

        parent::callOnBeforeDeleteEvent($object, $entity, $result);
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