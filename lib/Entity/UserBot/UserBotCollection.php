<?php

namespace Ramapriya\Telegram\Entity\UserBot;

/**
 * UserBotCollection
 *
 * Custom methods:
 * ---------------
 *
 * @method \int[] getUserIdList()
 * @method \int[] getBotIdList()
 * @method \Ramapriya\Telegram\Entity\User\User[] getUserList()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection getUserCollection()
 * @method \Ramapriya\Telegram\Entity\User\UserCollection fillUser()
 * @method \Ramapriya\Telegram\Entity\User\User[] getBotList()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection getBotCollection()
 * @method \Ramapriya\Telegram\Entity\User\UserCollection fillBot()
 *
 * Common methods:
 * ---------------
 *
 * @property-read \Bitrix\Main\ORM\Entity $entity
 * @method void add(\Ramapriya\Telegram\Entity\UserBot\UserBot $object)
 * @method bool has(\Ramapriya\Telegram\Entity\UserBot\UserBot $object)
 * @method bool hasByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot getByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot[] getAll()
 * @method bool remove(\Ramapriya\Telegram\Entity\UserBot\UserBot $object)
 * @method void removeByPrimary($primary)
 * @method array|\Bitrix\Main\ORM\Objectify\Collection|null fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
 * @method static \Ramapriya\Telegram\Entity\UserBot\UserBotCollection wakeUp($data)
 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
 * @method void offsetSet() ArrayAccess
 * @method void offsetExists() ArrayAccess
 * @method void offsetUnset() ArrayAccess
 * @method void offsetGet() ArrayAccess
 * @method void rewind() Iterator
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot current() Iterator
 * @method mixed key() Iterator
 * @method void next() Iterator
 * @method bool valid() Iterator
 * @method int count() Countable
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection merge(?\Ramapriya\Telegram\Entity\UserBot\UserBotCollection $collection)
 * @method bool isEmpty()
 * @method array collectValues(int $valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, int $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL, bool $recursive = false)
 */
class UserBotCollection extends EO_UserBot_Collection
{
}