<?php

namespace Ramapriya\Telegram\Entity\Update;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Event;
use Bitrix\Main\ORM\EventResult;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Join;
use Ramapriya\Telegram\Entity\Bot\Bot;
use Ramapriya\Telegram\Entity\Bot\BotTable;
use Ramapriya\Telegram\Service\Webhook;

/**
 * @method static EO_Update_Query query()
 * @method static EO_Update_Result getByPrimary($primary, array $parameters = [])
 * @method static EO_Update_Result getById($id)
 * @method static EO_Update_Result getList(array $parameters = [])
 * @method static EO_Update_Entity getEntity()
 * @method static \Ramapriya\Telegram\Entity\Update\Update createObject($setDefaultValues = true)
 * @method static \Ramapriya\Telegram\Entity\Update\UpdateCollection createCollection()
 * @method static \Ramapriya\Telegram\Entity\Update\Update wakeUpObject($row)
 * @method static \Ramapriya\Telegram\Entity\Update\UpdateCollection wakeUpCollection($rows)
 */
class UpdateTable extends DataManager
{
    public static function getObjectClass(): string
    {
        return Update::class;
    }

    public static function getCollectionClass(): string
    {
        return UpdateCollection::class;
    }

    public static function getTableName(): string
    {
        return 'telegram_update';
    }

    public static function getMap(): array
    {
        return [
            (new Fields\IntegerField('ID'))
                ->configurePrimary()
                ->configureAutocomplete()
                ->addFetchDataModifier(fn($value) => (int)$value),
            (new Fields\IntegerField('BOT_ID'))
                ->configureRequired()
                ->configureSize(8)
                ->addFetchDataModifier(fn ($value) => (int)$value),
            (new Fields\TextField('UPDATE'))
                ->configureRequired()
                ->addFetchDataModifier(fn ($value) => json_decode($value, true)),
            new Fields\Relations\Reference(
                'BOT',
                BotTable::class,
                Join::on('this.BOT_ID', 'ref.ID')
            ),
        ];
    }
}