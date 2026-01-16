<?php

namespace Ramapriya\Telegram\Entity\Bot;

/**
 * BotCollection
 *
 * Custom methods:
 * ---------------
 *
 * @method \int[] getIdList()
 * @method \string[] getTokenList()
 * @method \string[] fillToken()
 *
 * Common methods:
 * ---------------
 *
 * @property-read \Bitrix\Main\ORM\Entity $entity
 * @method void add(\Ramapriya\Telegram\Entity\Bot\Bot $object)
 * @method bool has(\Ramapriya\Telegram\Entity\Bot\Bot $object)
 * @method bool hasByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\Bot\Bot getByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\Bot\Bot[] getAll()
 * @method bool remove(\Ramapriya\Telegram\Entity\Bot\Bot $object)
 * @method void removeByPrimary($primary)
 * @method array|\Bitrix\Main\ORM\Objectify\Collection|null fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
 * @method static \Ramapriya\Telegram\Entity\Bot\BotCollection wakeUp($data)
 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
 * @method void offsetSet() ArrayAccess
 * @method void offsetExists() ArrayAccess
 * @method void offsetUnset() ArrayAccess
 * @method void offsetGet() ArrayAccess
 * @method void rewind() Iterator
 * @method \Ramapriya\Telegram\Entity\Bot\Bot current() Iterator
 * @method mixed key() Iterator
 * @method void next() Iterator
 * @method bool valid() Iterator
 * @method int count() Countable
 * @method \Ramapriya\Telegram\Entity\Bot\BotCollection merge(?\Ramapriya\Telegram\Entity\Bot\BotCollection $collection)
 * @method bool isEmpty()
 * @method array collectValues(int $valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, int $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL, bool $recursive = false)
 */
class BotCollection extends EO_Bot_Collection
{
}