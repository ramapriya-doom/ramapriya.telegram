<?php

namespace Ramapriya\Telegram\Entity\User;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Join;
use Ramapriya\Telegram\Entity\Bot\BotTable;
use Ramapriya\Telegram\Entity\UserBot\UserBotTable;

/**
 * @method static EO_User_Query query()
 * @method static EO_User_Result getByPrimary($primary, array $parameters = [])
 * @method static EO_User_Result getById($id)
 * @method static EO_User_Result getList(array $parameters = [])
 * @method static EO_User_Entity getEntity()
 * @method static \Ramapriya\Telegram\Entity\User\User createObject($setDefaultValues = true)
 * @method static \Ramapriya\Telegram\Entity\User\UserCollection createCollection()
 * @method static \Ramapriya\Telegram\Entity\User\User wakeUpObject($row)
 * @method static \Ramapriya\Telegram\Entity\User\UserCollection wakeUpCollection($rows)
 */
class UserTable extends DataManager
{

    public static function getObjectClass(): string
    {
        return User::class;
    }

    public static function getCollectionClass(): string
    {
        return UserCollection::class;
    }

    public static function getTableName()
    {
        return 'telegram_user';
    }

    public static function getMap(): array
    {
        return [
            (new Fields\IntegerField('ID'))
                ->configurePrimary()
                ->configureSize(8),
            (new Fields\BooleanField('IS_BOT'))
                ->configureDefaultValue(false),
            (new Fields\StringField('FIRST_NAME'))
                ->configureRequired(),
            new Fields\StringField('LAST_NAME'),
            new Fields\StringField('USERNAME'),
            new Fields\StringField('LANGUAGE_CODE'),
            new Fields\IntegerField('USER_ID'),
            new Fields\Relations\Reference(
                'USER',
                \Bitrix\Main\UserTable::class,
                Join::on('this.USER_ID', 'ref.ID')
            ),
            new Fields\Relations\Reference(
                'BOT',
                BotTable::class,
                Join::on('this.ID', 'ref.ID')->where('this.IS_BOT', '=', true)
            ),
            new Fields\Relations\Reference(
                'USER_BOT',
                UserBotTable::class,
                Join::on('this.ID', 'ref.USER_ID')
            ),
        ];
    }
}