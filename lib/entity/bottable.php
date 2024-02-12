<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Ramapriya\Telegram\Service\Webhook;

class BotTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'telegram_bot';
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
                ->configureNullable(),
            (new Fields\Relations\ManyToMany(
                'MESSAGE_HANDLER',
                MessageHandlerTable::class,
                )
            )->configureTableName('telegram_bot_handlers')
        ];
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
        throw new \Exception('Механизм обновления не поддерживается, чтобы изменить данные, удалите запись и добавьте заново');
    }
}