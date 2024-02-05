<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;

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
            (new Fields\Relations\OneToMany(
                'MESSAGE_HANDLER',
                MessageHandlerTable::class,
                'BOT')
            )->configureJoinType('inner')
        ];
    }
}