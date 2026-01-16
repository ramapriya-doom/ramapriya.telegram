<?php

namespace Ramapriya\Telegram\Entity\UserBot;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Join;
use Ramapriya\Telegram\Entity\User\UserTable;

/**
 * @method static EO_UserBot_Query query()
 * @method static EO_UserBot_Result getByPrimary($primary, array $parameters = [])
 * @method static EO_UserBot_Result getById($id)
 * @method static EO_UserBot_Result getList(array $parameters = [])
 * @method static EO_UserBot_Entity getEntity()
 * @method static \Ramapriya\Telegram\Entity\UserBot\UserBot createObject($setDefaultValues = true)
 * @method static \Ramapriya\Telegram\Entity\UserBot\UserBotCollection createCollection()
 * @method static \Ramapriya\Telegram\Entity\UserBot\UserBot wakeUpObject($row)
 * @method static \Ramapriya\Telegram\Entity\UserBot\UserBotCollection wakeUpCollection($rows)
 */
class UserBotTable extends DataManager
{
    public static function getObjectClass(): string
    {
        return UserBot::class;
    }

    public static function getCollectionClass(): string
    {
        return UserBotCollection::class;
    }

    public static function getTableName()
    {
        return 'telegram_user_bot';
    }

    public static function getMap()
    {
        return [
            (new Fields\IntegerField('USER_ID'))
                ->configurePrimary()
                ->configureSize(8),
            (new Fields\IntegerField('BOT_ID'))
                ->configurePrimary()
                ->configureSize(8),
            new Fields\Relations\Reference(
                'USER',
                UserTable::class,
                Join::on('this.USER_ID', 'ref.ID')
            ),
            new Fields\Relations\Reference(
                'BOT',
                UserTable::class,
                Join::on('this.BOT_ID', 'ref.ID')->where('ref.IS_BOT', '=', true)
            ),
        ];
    }
}