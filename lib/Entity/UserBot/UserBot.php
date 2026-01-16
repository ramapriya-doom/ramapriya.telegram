<?php

namespace Ramapriya\Telegram\Entity\UserBot;

/**
 * UserBot
 * @see \Ramapriya\Telegram\Entity\UserBot\UserBotTable
 *
 * Custom methods:
 * ---------------
 *
 * @method \int getUserId()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot setUserId(\int|\Bitrix\Main\DB\SqlExpression $userId)
 * @method bool hasUserId()
 * @method bool isUserIdFilled()
 * @method bool isUserIdChanged()
 * @method \int getBotId()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot setBotId(\int|\Bitrix\Main\DB\SqlExpression $botId)
 * @method bool hasBotId()
 * @method bool isBotIdFilled()
 * @method bool isBotIdChanged()
 * @method \Ramapriya\Telegram\Entity\User\User getUser()
 * @method \Ramapriya\Telegram\Entity\User\User remindActualUser()
 * @method \Ramapriya\Telegram\Entity\User\User requireUser()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot setUser(\Ramapriya\Telegram\Entity\User\User $object)
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot resetUser()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot unsetUser()
 * @method bool hasUser()
 * @method bool isUserFilled()
 * @method bool isUserChanged()
 * @method \Ramapriya\Telegram\Entity\User\User fillUser()
 * @method \Ramapriya\Telegram\Entity\User\User getBot()
 * @method \Ramapriya\Telegram\Entity\User\User remindActualBot()
 * @method \Ramapriya\Telegram\Entity\User\User requireBot()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot setBot(\Ramapriya\Telegram\Entity\User\User $object)
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot resetBot()
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot unsetBot()
 * @method bool hasBot()
 * @method bool isBotFilled()
 * @method bool isBotChanged()
 * @method \Ramapriya\Telegram\Entity\User\User fillBot()
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
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot set($fieldName, $value)
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot reset($fieldName)
 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot unset($fieldName)
 * @method void addTo($fieldName, $value)
 * @method void removeFrom($fieldName, $value)
 * @method void removeAll($fieldName)
 * @method \Bitrix\Main\ORM\Data\Result delete()
 * @method mixed fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
 * @method static \Ramapriya\Telegram\Entity\UserBot\UserBot wakeUp($data)
 */
class UserBot extends EO_UserBot
{
}