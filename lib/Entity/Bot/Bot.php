<?php

namespace Ramapriya\Telegram\Entity\Bot;

/**
 * Bot
 * @see \Ramapriya\Telegram\Entity\Bot\BotTable
 *
 * Custom methods:
 * ---------------
 *
 * @method \int getId()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot setId(\int|\Bitrix\Main\DB\SqlExpression $id)
 * @method bool hasId()
 * @method bool isIdFilled()
 * @method bool isIdChanged()
 * @method \string getToken()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot setToken(\string|\Bitrix\Main\DB\SqlExpression $token)
 * @method bool hasToken()
 * @method bool isTokenFilled()
 * @method bool isTokenChanged()
 * @method \string remindActualToken()
 * @method \string requireToken()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot resetToken()
 * @method \Ramapriya\Telegram\Entity\Bot\Bot unsetToken()
 * @method \string fillToken()
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
 * @method \Ramapriya\Telegram\Entity\Bot\Bot set($fieldName, $value)
 * @method \Ramapriya\Telegram\Entity\Bot\Bot reset($fieldName)
 * @method \Ramapriya\Telegram\Entity\Bot\Bot unset($fieldName)
 * @method void addTo($fieldName, $value)
 * @method void removeFrom($fieldName, $value)
 * @method void removeAll($fieldName)
 * @method \Bitrix\Main\ORM\Data\Result delete()
 * @method mixed fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
 * @method static \Ramapriya\Telegram\Entity\Bot\Bot wakeUp($data)
 */
class Bot extends EO_Bot
{

}