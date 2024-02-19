<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;

class MessageHandlerTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'telegram_message_handler';
    }

    public static function getObjectClass(): string
    {
        return MessageHandler::class;
    }

    public static function getMap()
    {
        return [
            (new Fields\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new Fields\IntegerField('BOT_ID'))
                ->configureRequired(),
            (new Fields\StringField('MESSAGE'))
                ->configureRequired()
                ->configureUnique(),
            new Fields\StringField('MODULE_ID'),
            (new Fields\StringField('HANDLER_CLASS'))
                ->configureRequired(),
            (new Fields\Relations\ManyToMany('BOT', BotTable::class))
                ->configureTableName('telegram_bot_handlers')
        ];
    }
}