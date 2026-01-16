<?php

namespace Ramapriya\Telegram\Entity\User;

/**
 * UserCollection
 *
 * Custom methods:
 * ---------------
 *
 * @method \int[] getIdList()
 * @method \boolean[] getIsBotList()
 * @method \boolean[] fillIsBot()
 * @method \string[] getFirstNameList()
 * @method \string[] fillFirstName()
 * @method \string[] getLastNameList()
 * @method \string[] fillLastName()
 * @method \string[] getUsernameList()
 * @method \string[] fillUsername()
 * @method \string[] getLanguageCodeList()
 * @method \string[] fillLanguageCode()
 * @method \int[] getUserIdList()
 * @method \int[] fillUserId()
 * @method \Bitrix\Main\EO_User[] getUserList()
 * @method \Ramapriya\Telegram\Entity\User\UserCollection getUserCollection()
 * @method \Bitrix\Main\EO_User_Collection fillUser()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot[] getBotList()
 * @method \Ramapriya\Telegram\Entity\User\UserCollection getBotCollection()
 * @method \Ramapriya\Telegram\Entity\Bot\BotCollection fillBot()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot[] getUserBotList()
 * @method \Ramapriya\Telegram\Entity\User\UserCollection getUserBotCollection()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection fillUserBot()
 *
 * Common methods:
 * ---------------
 *
 * @property-read \Bitrix\Main\ORM\Entity $entity
 * @method void add(\Ramapriya\Telegram\Entity\User\User $object)
 * @method bool has(\Ramapriya\Telegram\Entity\User\User $object)
 * @method bool hasByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\User\User getByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\User\User[] getAll()
 * @method bool remove(\Ramapriya\Telegram\Entity\User\User $object)
 * @method void removeByPrimary($primary)
 * @method array|\Bitrix\Main\ORM\Objectify\Collection|null fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
 * @method static \Ramapriya\Telegram\Entity\User\UserCollection wakeUp($data)
 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
 * @method void offsetSet() ArrayAccess
 * @method void offsetExists() ArrayAccess
 * @method void offsetUnset() ArrayAccess
 * @method void offsetGet() ArrayAccess
 * @method void rewind() Iterator
 * @method \Ramapriya\Telegram\Entity\User\User current() Iterator
 * @method mixed key() Iterator
 * @method void next() Iterator
 * @method bool valid() Iterator
 * @method int count() Countable
 * @method \Ramapriya\Telegram\Entity\User\UserCollection merge(?\Ramapriya\Telegram\Entity\User\UserCollection $collection)
 * @method bool isEmpty()
 * @method array collectValues(int $valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, int $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL, bool $recursive = false)
 */
class UserCollection extends EO_User_Collection
{
}