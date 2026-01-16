<?php

namespace Ramapriya\Telegram\Entity\Update;

/**
 * UpdateCollection
 *
 * Custom methods:
 * ---------------
 *
 * @method \int[] getIdList()
 * @method \int[] getBotIdList()
 * @method \int[] fillBotId()
 * @method \string[] getUpdateList()
 * @method \string[] fillUpdate()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot[] getBotList()
 * @method \Ramapriya\Telegram\Entity\Update\UpdateCollection getBotCollection()
 * @method \Ramapriya\Telegram\Entity\Bot\BotCollection fillBot()
 *
 * Common methods:
 * ---------------
 *
 * @property-read \Bitrix\Main\ORM\Entity $entity
 * @method void add(\Ramapriya\Telegram\Entity\Update\Update $object)
 * @method bool has(\Ramapriya\Telegram\Entity\Update\Update $object)
 * @method bool hasByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\Update\Update getByPrimary($primary)
 * @method \Ramapriya\Telegram\Entity\Update\Update[] getAll()
 * @method bool remove(\Ramapriya\Telegram\Entity\Update\Update $object)
 * @method void removeByPrimary($primary)
 * @method array|\Bitrix\Main\ORM\Objectify\Collection|null fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
 * @method static \Ramapriya\Telegram\Entity\Update\UpdateCollection wakeUp($data)
 * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
 * @method void offsetSet() ArrayAccess
 * @method void offsetExists() ArrayAccess
 * @method void offsetUnset() ArrayAccess
 * @method void offsetGet() ArrayAccess
 * @method void rewind() Iterator
 * @method \Ramapriya\Telegram\Entity\Update\Update current() Iterator
 * @method mixed key() Iterator
 * @method void next() Iterator
 * @method bool valid() Iterator
 * @method int count() Countable
 * @method \Ramapriya\Telegram\Entity\Update\UpdateCollection merge(?\Ramapriya\Telegram\Entity\Update\UpdateCollection $collection)
 * @method bool isEmpty()
 * @method array collectValues(int $valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, int $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL, bool $recursive = false)
 */
class UpdateCollection extends EO_Update_Collection
{
}