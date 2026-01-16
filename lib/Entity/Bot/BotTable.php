<?php

namespace Ramapriya\Telegram\Entity\Bot;

use Bitrix\Main\NotImplementedException;
use Bitrix\Main\ORM\Data;
use Bitrix\Main\ORM\Event;
use Bitrix\Main\ORM\EventResult;
use Bitrix\Main\ORM\Fields;
use Bitrix\Main\ORM\Query\Join;
use Ramapriya\Telegram\Entity\Update\UpdateTable;
use Ramapriya\Telegram\Entity\User\UserTable;
use Ramapriya\Telegram\Entity\UserBot\UserBotTable;
use Ramapriya\Telegram\Event\BotHandler;

/**
 * @method static EO_Bot_Query query()
 * @method static EO_Bot_Result getByPrimary($primary, array $parameters = [])
 * @method static EO_Bot_Result getById($id)
 * @method static EO_Bot_Result getList(array $parameters = [])
 * @method static EO_Bot_Entity getEntity()
 * @method static \Ramapriya\Telegram\Entity\Bot\Bot createObject($setDefaultValues = true)
 * @method static \Ramapriya\Telegram\Entity\Bot\BotCollection createCollection()
 * @method static \Ramapriya\Telegram\Entity\Bot\Bot wakeUpObject($row)
 * @method static \Ramapriya\Telegram\Entity\Bot\BotCollection wakeUpCollection($rows)
 */
class BotTable extends Data\DataManager
{
    public static function getObjectClass(): string
    {
        return Bot::class;
    }

    public static function getCollectionClass(): string
    {
        return BotCollection::class;
    }

    public static function getTableName(): string
    {
        return 'telegram_bot';
    }

    public static function getMap(): array
    {
        return [
            (new Fields\IntegerField('ID'))
                ->configurePrimary()
                ->configureSize(8),
            (new Fields\StringField('TOKEN'))
                ->configureRequired(),
            new Fields\Relations\Reference(
                'USER',
                UserTable::class,
                Join::on('this.ID', 'ref.ID')
                    ->where('ref.IS_BOT', '=', true)
            ),
            new Fields\Relations\Reference(
                'USER_BOT',
                UserBotTable::class,
                Join::on('this.ID', 'ref.BOT_ID')
            ),
            new Fields\Relations\OneToMany('UPDATES', UpdateTable::class, 'BOT'),
        ];
    }

    /**
     * @deprecated Используйте \Ramapriya\Telegram\Entity\Bot\BotTable::addByToken
     * @see \Ramapriya\Telegram\Entity\Bot\BotTable::addByToken
     */
    public static function add(array $data)
    {
        throw new NotImplementedException('Use \Ramapriya\Telegram\Entity\Bot\BotTable::addByToken');
    }

    /**
     * @deprecated Функционал обновления не поддерживается
     */
    public static function update($primary, array $data)
    {
        throw new NotImplementedException('Not supports');
    }

    /**
     * @deprecated Используйте \Ramapriya\Telegram\Entity\Bot\BotTable::deleteByToken
     * @see \Ramapriya\Telegram\Entity\Bot\BotTable::deleteByToken
     */
    public static function delete($primary)
    {
        throw new NotImplementedException('Use \Ramapriya\Telegram\Entity\Bot\BotTable::deleteByToken');
    }

    public static function getByToken(string $token, array $params = []): EO_Bot_Result|\Bitrix\Main\ORM\Query\Result
    {
        $params['filter']['TOKEN'] = $token;
        return parent::getList($params);
    }

    public static function addByToken(string $token): Data\AddResult
    {
        [$botId,] = explode(':', $token);
        return parent::add([
            'ID' => $botId,
            'TOKEN' => $token,
        ]);
    }

    public static function deleteByToken(string $token): Data\DeleteResult
    {
        [$botId,] = explode(':', $token);
        return parent::delete($botId);
    }

    public static function onAfterAdd(Event $event): EventResult
    {
        $handler = new BotHandler($event);
        $handler->saveBotInfo()->setWebhook();
        return $handler->getResult();
    }

    public static function onBeforeDelete(Event $event): EventResult
    {
        $handler = new BotHandler($event);
        $result = $handler->deleteWebhook()->deleteReferences()->getResult();
        return $result;
    }
}