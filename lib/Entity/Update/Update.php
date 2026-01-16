<?php

namespace Ramapriya\Telegram\Entity\Update;

/**
 * Update
 * @see \Ramapriya\Telegram\Entity\Update\UpdateTable
 *
 * Custom methods:
 * ---------------
 *
 * @method \int getId()
 * @method \Ramapriya\Telegram\Entity\Update\Update setId(\int|\Bitrix\Main\DB\SqlExpression $id)
 * @method bool hasId()
 * @method bool isIdFilled()
 * @method bool isIdChanged()
 * @method \int getBotId()
 * @method \Ramapriya\Telegram\Entity\Update\Update setBotId(\int|\Bitrix\Main\DB\SqlExpression $botId)
 * @method bool hasBotId()
 * @method bool isBotIdFilled()
 * @method bool isBotIdChanged()
 * @method \int remindActualBotId()
 * @method \int requireBotId()
 * @method \Ramapriya\Telegram\Entity\Update\Update resetBotId()
 * @method \Ramapriya\Telegram\Entity\Update\Update unsetBotId()
 * @method \int fillBotId()
 * @method \array getUpdate()
 * @method \Ramapriya\Telegram\Entity\Update\Update setUpdate(\string|\Bitrix\Main\DB\SqlExpression $update)
 * @method bool hasUpdate()
 * @method bool isUpdateFilled()
 * @method bool isUpdateChanged()
 * @method \string remindActualUpdate()
 * @method \string requireUpdate()
 * @method \Ramapriya\Telegram\Entity\Update\Update resetUpdate()
 * @method \Ramapriya\Telegram\Entity\Update\Update unsetUpdate()
 * @method \string fillUpdate()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot getBot()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot remindActualBot()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot requireBot()
 * @method \Ramapriya\Telegram\Entity\Update\Update setBot(\Ramapriya\Telegram\Entity\Bot\Bot $object)
 * @method \Ramapriya\Telegram\Entity\Update\Update resetBot()
 * @method \Ramapriya\Telegram\Entity\Update\Update unsetBot()
 * @method bool hasBot()
 * @method bool isBotFilled()
 * @method bool isBotChanged()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot fillBot()
 *
 * Common methods:
 * ---------------
 *
 * @property-read \Bitrix\Main\ORM\Entity $entity
 * @property-read array $primary
 * @property-read int $state @see \Bitrix\Main\ORM\Objectify\State
 * @property-read \Bitrix\Main\Type\Dictionary $customData
 * @property \Bitrix\Main\Authentication\Context $authContext
 * @method mixed get($fieldName)
 * @method mixed remindActual($fieldName)
 * @method mixed require($fieldName)
 * @method bool has($fieldName)
 * @method bool isFilled($fieldName)
 * @method bool isChanged($fieldName)
 * @method \Ramapriya\Telegram\Entity\Update\Update set($fieldName, $value)
 * @method \Ramapriya\Telegram\Entity\Update\Update reset($fieldName)
 * @method \Ramapriya\Telegram\Entity\Update\Update unset($fieldName)
 * @method void addTo($fieldName, $value)
 * @method void removeFrom($fieldName, $value)
 * @method void removeAll($fieldName)
 * @method \Bitrix\Main\ORM\Data\Result delete()
 * @method mixed fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
 * @method static \Ramapriya\Telegram\Entity\Update\Update wakeUp($data)
 */
class Update extends EO_Update
{
}