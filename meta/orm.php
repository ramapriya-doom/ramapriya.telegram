<?php

/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\User\UserTable */
namespace Ramapriya\Telegram\Entity\User {
	/**
	 * User
	 * @see \Ramapriya\Telegram\Entity\User\UserTable
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int getId()
	 * @method \Ramapriya\Telegram\Entity\User\User setId(\int|\Bitrix\Main\DB\SqlExpression $id)
	 * @method bool hasId()
	 * @method bool isIdFilled()
	 * @method bool isIdChanged()
	 * @method \boolean getIsBot()
	 * @method \Ramapriya\Telegram\Entity\User\User setIsBot(\boolean|\Bitrix\Main\DB\SqlExpression $isBot)
	 * @method bool hasIsBot()
	 * @method bool isIsBotFilled()
	 * @method bool isIsBotChanged()
	 * @method \boolean remindActualIsBot()
	 * @method \boolean requireIsBot()
	 * @method \Ramapriya\Telegram\Entity\User\User resetIsBot()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetIsBot()
	 * @method \boolean fillIsBot()
	 * @method \string getFirstName()
	 * @method \Ramapriya\Telegram\Entity\User\User setFirstName(\string|\Bitrix\Main\DB\SqlExpression $firstName)
	 * @method bool hasFirstName()
	 * @method bool isFirstNameFilled()
	 * @method bool isFirstNameChanged()
	 * @method \string remindActualFirstName()
	 * @method \string requireFirstName()
	 * @method \Ramapriya\Telegram\Entity\User\User resetFirstName()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetFirstName()
	 * @method \string fillFirstName()
	 * @method \string getLastName()
	 * @method \Ramapriya\Telegram\Entity\User\User setLastName(\string|\Bitrix\Main\DB\SqlExpression $lastName)
	 * @method bool hasLastName()
	 * @method bool isLastNameFilled()
	 * @method bool isLastNameChanged()
	 * @method \string remindActualLastName()
	 * @method \string requireLastName()
	 * @method \Ramapriya\Telegram\Entity\User\User resetLastName()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetLastName()
	 * @method \string fillLastName()
	 * @method \string getUsername()
	 * @method \Ramapriya\Telegram\Entity\User\User setUsername(\string|\Bitrix\Main\DB\SqlExpression $username)
	 * @method bool hasUsername()
	 * @method bool isUsernameFilled()
	 * @method bool isUsernameChanged()
	 * @method \string remindActualUsername()
	 * @method \string requireUsername()
	 * @method \Ramapriya\Telegram\Entity\User\User resetUsername()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetUsername()
	 * @method \string fillUsername()
	 * @method \string getLanguageCode()
	 * @method \Ramapriya\Telegram\Entity\User\User setLanguageCode(\string|\Bitrix\Main\DB\SqlExpression $languageCode)
	 * @method bool hasLanguageCode()
	 * @method bool isLanguageCodeFilled()
	 * @method bool isLanguageCodeChanged()
	 * @method \string remindActualLanguageCode()
	 * @method \string requireLanguageCode()
	 * @method \Ramapriya\Telegram\Entity\User\User resetLanguageCode()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetLanguageCode()
	 * @method \string fillLanguageCode()
	 * @method \int getUserId()
	 * @method \Ramapriya\Telegram\Entity\User\User setUserId(\int|\Bitrix\Main\DB\SqlExpression $userId)
	 * @method bool hasUserId()
	 * @method bool isUserIdFilled()
	 * @method bool isUserIdChanged()
	 * @method \int remindActualUserId()
	 * @method \int requireUserId()
	 * @method \Ramapriya\Telegram\Entity\User\User resetUserId()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetUserId()
	 * @method \int fillUserId()
	 * @method \Bitrix\Main\EO_User getUser()
	 * @method \Bitrix\Main\EO_User remindActualUser()
	 * @method \Bitrix\Main\EO_User requireUser()
	 * @method \Ramapriya\Telegram\Entity\User\User setUser(\Bitrix\Main\EO_User $object)
	 * @method \Ramapriya\Telegram\Entity\User\User resetUser()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetUser()
	 * @method bool hasUser()
	 * @method bool isUserFilled()
	 * @method bool isUserChanged()
	 * @method \Bitrix\Main\EO_User fillUser()
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot getBot()
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot remindActualBot()
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot requireBot()
	 * @method \Ramapriya\Telegram\Entity\User\User setBot(\Ramapriya\Telegram\Entity\Bot\Bot $object)
	 * @method \Ramapriya\Telegram\Entity\User\User resetBot()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetBot()
	 * @method bool hasBot()
	 * @method bool isBotFilled()
	 * @method bool isBotChanged()
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot fillBot()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot getUserBot()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot remindActualUserBot()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot requireUserBot()
	 * @method \Ramapriya\Telegram\Entity\User\User setUserBot(\Ramapriya\Telegram\Entity\UserBot\UserBot $object)
	 * @method \Ramapriya\Telegram\Entity\User\User resetUserBot()
	 * @method \Ramapriya\Telegram\Entity\User\User unsetUserBot()
	 * @method bool hasUserBot()
	 * @method bool isUserBotFilled()
	 * @method bool isUserBotChanged()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot fillUserBot()
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
	 * @method \Ramapriya\Telegram\Entity\User\User set($fieldName, $value)
	 * @method \Ramapriya\Telegram\Entity\User\User reset($fieldName)
	 * @method \Ramapriya\Telegram\Entity\User\User unset($fieldName)
	 * @method void addTo($fieldName, $value)
	 * @method void removeFrom($fieldName, $value)
	 * @method void removeAll($fieldName)
	 * @method \Bitrix\Main\ORM\Data\Result delete()
	 * @method mixed fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
	 * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
	 * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
	 * @method static \Ramapriya\Telegram\Entity\User\User wakeUp($data)
	 */
	class EO_User {
		/* @var \Ramapriya\Telegram\Entity\User\UserTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\User\UserTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Ramapriya\Telegram\Entity\User {
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
	class EO_User_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Ramapriya\Telegram\Entity\User\UserTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\User\UserTable';
	}
}
namespace Ramapriya\Telegram\Entity\User {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_User_Result exec()
	 * @method \Ramapriya\Telegram\Entity\User\User fetchObject()
	 * @method \Ramapriya\Telegram\Entity\User\UserCollection fetchCollection()
	 */
	class EO_User_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Ramapriya\Telegram\Entity\User\User fetchObject()
	 * @method \Ramapriya\Telegram\Entity\User\UserCollection fetchCollection()
	 */
	class EO_User_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Ramapriya\Telegram\Entity\User\User createObject($setDefaultValues = true)
	 * @method \Ramapriya\Telegram\Entity\User\UserCollection createCollection()
	 * @method \Ramapriya\Telegram\Entity\User\User wakeUpObject($row)
	 * @method \Ramapriya\Telegram\Entity\User\UserCollection wakeUpCollection($rows)
	 */
	class EO_User_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\Bot\BotTable */
namespace Ramapriya\Telegram\Entity\Bot {
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
	class EO_Bot {
		/* @var \Ramapriya\Telegram\Entity\Bot\BotTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\Bot\BotTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Ramapriya\Telegram\Entity\Bot {
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
	class EO_Bot_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Ramapriya\Telegram\Entity\Bot\BotTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\Bot\BotTable';
	}
}
namespace Ramapriya\Telegram\Entity\Bot {
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
	class BotTable extends \Bitrix\Main\ORM\Data\DataManager {}
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Bot_Result exec()
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot fetchObject()
	 * @method \Ramapriya\Telegram\Entity\Bot\BotCollection fetchCollection()
	 */
	class EO_Bot_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot fetchObject()
	 * @method \Ramapriya\Telegram\Entity\Bot\BotCollection fetchCollection()
	 */
	class EO_Bot_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot createObject($setDefaultValues = true)
	 * @method \Ramapriya\Telegram\Entity\Bot\BotCollection createCollection()
	 * @method \Ramapriya\Telegram\Entity\Bot\Bot wakeUpObject($row)
	 * @method \Ramapriya\Telegram\Entity\Bot\BotCollection wakeUpCollection($rows)
	 */
	class EO_Bot_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\UserBot\UserBotTable */
namespace Ramapriya\Telegram\Entity\UserBot {
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
	class EO_UserBot {
		/* @var \Ramapriya\Telegram\Entity\UserBot\UserBotTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\UserBot\UserBotTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Ramapriya\Telegram\Entity\UserBot {
	/**
	 * UserBotCollection
	 *
	 * Custom methods:
	 * ---------------
	 *
	 * @method \int[] getUserIdList()
	 * @method \int[] getBotIdList()
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
	class EO_UserBot_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Ramapriya\Telegram\Entity\UserBot\UserBotTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\UserBot\UserBotTable';
	}
}
namespace Ramapriya\Telegram\Entity\UserBot {
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
	class UserBotTable extends \Bitrix\Main\ORM\Data\DataManager {}
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_UserBot_Result exec()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot fetchObject()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection fetchCollection()
	 */
	class EO_UserBot_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot fetchObject()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection fetchCollection()
	 */
	class EO_UserBot_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot createObject($setDefaultValues = true)
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection createCollection()
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBot wakeUpObject($row)
	 * @method \Ramapriya\Telegram\Entity\UserBot\UserBotCollection wakeUpCollection($rows)
	 */
	class EO_UserBot_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\Update\UpdateTable */
namespace Ramapriya\Telegram\Entity\Update {
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
	 * @method \string getUpdate()
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
	class EO_Update {
		/* @var \Ramapriya\Telegram\Entity\Update\UpdateTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\Update\UpdateTable';
		/**
		 * @param bool|array $setDefaultValues
		 */
		public function __construct($setDefaultValues = true) {}
	}
}
namespace Ramapriya\Telegram\Entity\Update {
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
	class EO_Update_Collection implements \ArrayAccess, \Iterator, \Countable {
		/* @var \Ramapriya\Telegram\Entity\Update\UpdateTable */
		static public $dataClass = '\Ramapriya\Telegram\Entity\Update\UpdateTable';
	}
}
namespace Ramapriya\Telegram\Entity\Update {
	/**
	 * Common methods:
	 * ---------------
	 *
	 * @method EO_Update_Result exec()
	 * @method \Ramapriya\Telegram\Entity\Update\Update fetchObject()
	 * @method \Ramapriya\Telegram\Entity\Update\UpdateCollection fetchCollection()
	 */
	class EO_Update_Query extends \Bitrix\Main\ORM\Query\Query {}
	/**
	 * @method \Ramapriya\Telegram\Entity\Update\Update fetchObject()
	 * @method \Ramapriya\Telegram\Entity\Update\UpdateCollection fetchCollection()
	 */
	class EO_Update_Result extends \Bitrix\Main\ORM\Query\Result {}
	/**
	 * @method \Ramapriya\Telegram\Entity\Update\Update createObject($setDefaultValues = true)
	 * @method \Ramapriya\Telegram\Entity\Update\UpdateCollection createCollection()
	 * @method \Ramapriya\Telegram\Entity\Update\Update wakeUpObject($row)
	 * @method \Ramapriya\Telegram\Entity\Update\UpdateCollection wakeUpCollection($rows)
	 */
	class EO_Update_Entity extends \Bitrix\Main\ORM\Entity {}
}