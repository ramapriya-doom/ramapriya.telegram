<?php

namespace Ramapriya\Telegram\Entity;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\NotSupportedException;
use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Data\UpdateResult;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Join;
use Bitrix\Main\ORM\Query\Result;

Loc::loadMessages(__FILE__);
Loc::loadMessages(__DIR__ . '/bottable.php');

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

    public static function getMap(): array
    {
        return [
            (new Fields\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new Fields\IntegerField('BOT_ID'))
                ->configureRequired(),
            (new Fields\StringField('MESSAGE'))
                ->configureTitle(Loc::getMessage('message_field_title')),
            (new Fields\StringField('MODULE_ID'))
                ->configureTitle(Loc::getMessage('module_id_field_title')),
            (new Fields\StringField('HANDLER_CLASS'))
                ->configureRequired()
                ->configureTitle(Loc::getMessage('handler_class_field_title')),
            (new Fields\BooleanField('DEFAULT'))
                ->configureRequired()
                ->configureDefaultValue(false)
                ->configureTitle(Loc::getMessage('is_default_field_title')),
            (new Fields\Relations\Reference(
                'BOT',
                BotTable::class,

                Join::on('this.BOT_ID', 'ref.ID')
            ))->configureTitle(Loc::getMessage('bot_field_title'))
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

    protected static function callOnBeforeAddEvent($object, $fields, $result)
    {
        /**
         * @var MessageHandler $object
         */
        if (!$object->hasMessage()) {
            $object->setDefault(true);
            $fields['DEFAULT'] = true;

            $defaultHandlers = self::getList([
                'filter' => [
                    'BOT_ID' => $object->getBotId(),
                    'DEFAULT' => true
                ],
                'select' => ['ID']
            ])->fetchCollection();

            foreach ($defaultHandlers as $defaultHandler) {
                $defaultHandler->setDefault(false)->save();
            }
        }

        parent::callOnBeforeAddEvent($object, $fields, $result);
    }
}