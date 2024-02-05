<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Join;

class MessageHandlerTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'telegram_message_handler';
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
            (new Fields\ArrayField('HANDLER'))
                ->configureRequired(),
            (new Fields\Relations\Reference(
                'BOT',
                BotTable::class,
                Join::on('this.BOT_ID', 'ref.ID')
            ))->configureJoinType('inner')
        ];
    }
}