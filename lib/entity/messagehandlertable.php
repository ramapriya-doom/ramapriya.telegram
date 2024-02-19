<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\ORM\Query\Result;

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
                ->configureRequired(),
            new Fields\StringField('MODULE_ID'),
            (new Fields\StringField('HANDLER_CLASS'))
                ->configureRequired(),
            new Fields\Relations\Reference('BOT', BotTable::class, Join::on('this.BOT_ID', 'ref.ID')),
        ];
    }

    public static function getByBotId(int $botId, array $params = []): Result|EO_MessageHandler_Result
    {
        $params['filter']['=BOT_ID'] = $botId;
        return static::getList($params);
    }

    public static function getByBotName(string $botName, array $params = []): Result|EO_MessageHandler_Result
    {
        $params['filter']['=BOT.NAME'] = $botName;
        return static::getList($params);
    }
}