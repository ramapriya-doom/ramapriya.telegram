<?php

/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\BotTable */
namespace Ramapriya\Telegram\Entity {
    /**
     * Bot
     * @see \Ramapriya\Telegram\Entity\BotTable
     *
     * Custom methods:
     * ---------------
     *
     * @method \int getId()
     * @method \Ramapriya\Telegram\Entity\Bot setId(\int|\Bitrix\Main\DB\SqlExpression $id)
     * @method bool hasId()
     * @method bool isIdFilled()
     * @method bool isIdChanged()
     * @method \string getApiToken()
     * @method \Ramapriya\Telegram\Entity\Bot setApiToken(\string|\Bitrix\Main\DB\SqlExpression $apiToken)
     * @method bool hasApiToken()
     * @method bool isApiTokenFilled()
     * @method bool isApiTokenChanged()
     * @method \string remindActualApiToken()
     * @method \string requireApiToken()
     * @method \Ramapriya\Telegram\Entity\Bot resetApiToken()
     * @method \Ramapriya\Telegram\Entity\Bot unsetApiToken()
     * @method \string fillApiToken()
     * @method \string getName()
     * @method \Ramapriya\Telegram\Entity\Bot setName(\string|\Bitrix\Main\DB\SqlExpression $name)
     * @method bool hasName()
     * @method bool isNameFilled()
     * @method bool isNameChanged()
     * @method \string remindActualName()
     * @method \string requireName()
     * @method \Ramapriya\Telegram\Entity\Bot resetName()
     * @method \Ramapriya\Telegram\Entity\Bot unsetName()
     * @method \string fillName()
     * @method ?\string getWebhookCustomUrl()
     * @method \Ramapriya\Telegram\Entity\Bot setWebhookCustomUrl(?\string|\Bitrix\Main\DB\SqlExpression $webhookCustomUrl)
     * @method bool hasWebhookCustomUrl()
     * @method bool isWebhookCustomUrlFilled()
     * @method bool isWebhookCustomUrlChanged()
     * @method ?\string remindActualWebhookCustomUrl()
     * @method ?\string requireWebhookCustomUrl()
     * @method \Ramapriya\Telegram\Entity\Bot resetWebhookCustomUrl()
     * @method \Ramapriya\Telegram\Entity\Bot unsetWebhookCustomUrl()
     * @method ?\string fillWebhookCustomUrl()
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
     * @method \Ramapriya\Telegram\Entity\Bot set($fieldName, $value)
     * @method \Ramapriya\Telegram\Entity\Bot reset($fieldName)
     * @method \Ramapriya\Telegram\Entity\Bot unset($fieldName)
     * @method void addTo($fieldName, $value)
     * @method void removeFrom($fieldName, $value)
     * @method void removeAll($fieldName)
     * @method \Bitrix\Main\ORM\Data\Result delete()
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
     * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
     * @method static \Ramapriya\Telegram\Entity\Bot wakeUp($data)
     */
    class EO_Bot {
        /* @var \Ramapriya\Telegram\Entity\BotTable */
        static public $dataClass = '\Ramapriya\Telegram\Entity\BotTable';
        /**
         * @param bool|array $setDefaultValues
         */
        public function __construct($setDefaultValues = true) {}
    }
}
namespace Ramapriya\Telegram\Entity {
    /**
     * EO_Bot_Collection
     *
     * Custom methods:
     * ---------------
     *
     * @method \int[] getIdList()
     * @method \string[] getApiTokenList()
     * @method \string[] fillApiToken()
     * @method \string[] getNameList()
     * @method \string[] fillName()
     * @method ?\string[] getWebhookCustomUrlList()
     * @method ?\string[] fillWebhookCustomUrl()
     *
     * Common methods:
     * ---------------
     *
     * @property-read \Bitrix\Main\ORM\Entity $entity
     * @method void add(\Ramapriya\Telegram\Entity\Bot $object)
     * @method bool has(\Ramapriya\Telegram\Entity\Bot $object)
     * @method bool hasByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\Bot getByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\Bot[] getAll()
     * @method bool remove(\Ramapriya\Telegram\Entity\Bot $object)
     * @method void removeByPrimary($primary)
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method static \Ramapriya\Telegram\Entity\EO_Bot_Collection wakeUp($data)
     * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
     * @method void offsetSet() ArrayAccess
     * @method void offsetExists() ArrayAccess
     * @method void offsetUnset() ArrayAccess
     * @method void offsetGet() ArrayAccess
     * @method void rewind() Iterator
     * @method \Ramapriya\Telegram\Entity\Bot current() Iterator
     * @method mixed key() Iterator
     * @method void next() Iterator
     * @method bool valid() Iterator
     * @method int count() Countable
     * @method EO_Bot_Collection merge(?EO_Bot_Collection $collection)
     * @method bool isEmpty()
     */
    class EO_Bot_Collection implements \ArrayAccess, \Iterator, \Countable {
        /* @var \Ramapriya\Telegram\Entity\BotTable */
        static public $dataClass = '\Ramapriya\Telegram\Entity\BotTable';
    }
}
namespace Ramapriya\Telegram\Entity {
    /**
     * @method static EO_Bot_Query query()
     * @method static EO_Bot_Result getByPrimary($primary, array $parameters = [])
     * @method static EO_Bot_Result getById($id)
     * @method static EO_Bot_Result getList(array $parameters = [])
     * @method static EO_Bot_Entity getEntity()
     * @method static \Ramapriya\Telegram\Entity\Bot createObject($setDefaultValues = true)
     * @method static \Ramapriya\Telegram\Entity\EO_Bot_Collection createCollection()
     * @method static \Ramapriya\Telegram\Entity\Bot wakeUpObject($row)
     * @method static \Ramapriya\Telegram\Entity\EO_Bot_Collection wakeUpCollection($rows)
     */
    class BotTable extends \Bitrix\Main\ORM\Data\DataManager {}
    /**
     * Common methods:
     * ---------------
     *
     * @method EO_Bot_Result exec()
     * @method \Ramapriya\Telegram\Entity\Bot fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection fetchCollection()
     *
     * Custom methods:
     * ---------------
     *
     */
    class EO_Bot_Query extends \Bitrix\Main\ORM\Query\Query {}
    /**
     * @method \Ramapriya\Telegram\Entity\Bot fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection fetchCollection()
     */
    class EO_Bot_Result extends \Bitrix\Main\ORM\Query\Result {}
    /**
     * @method \Ramapriya\Telegram\Entity\Bot createObject($setDefaultValues = true)
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection createCollection()
     * @method \Ramapriya\Telegram\Entity\Bot wakeUpObject($row)
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection wakeUpCollection($rows)
     */
    class EO_Bot_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\MessageHandlerTable */
namespace Ramapriya\Telegram\Entity {
    /**
     * MessageHandler
     * @see \Ramapriya\Telegram\Entity\MessageHandlerTable
     *
     * Custom methods:
     * ---------------
     *
     * @method \int getId()
     * @method \Ramapriya\Telegram\Entity\MessageHandler setId(\int|\Bitrix\Main\DB\SqlExpression $id)
     * @method bool hasId()
     * @method bool isIdFilled()
     * @method bool isIdChanged()
     * @method \int getBotId()
     * @method \Ramapriya\Telegram\Entity\MessageHandler setBotId(\int|\Bitrix\Main\DB\SqlExpression $botId)
     * @method bool hasBotId()
     * @method bool isBotIdFilled()
     * @method bool isBotIdChanged()
     * @method \int remindActualBotId()
     * @method \int requireBotId()
     * @method \Ramapriya\Telegram\Entity\MessageHandler resetBotId()
     * @method \Ramapriya\Telegram\Entity\MessageHandler unsetBotId()
     * @method \int fillBotId()
     * @method \string getMessage()
     * @method \Ramapriya\Telegram\Entity\MessageHandler setMessage(\string|\Bitrix\Main\DB\SqlExpression $message)
     * @method bool hasMessage()
     * @method bool isMessageFilled()
     * @method bool isMessageChanged()
     * @method \string remindActualMessage()
     * @method \string requireMessage()
     * @method \Ramapriya\Telegram\Entity\MessageHandler resetMessage()
     * @method \Ramapriya\Telegram\Entity\MessageHandler unsetMessage()
     * @method \string fillMessage()
     * @method \string getModuleId()
     * @method \Ramapriya\Telegram\Entity\MessageHandler setModuleId(\string|\Bitrix\Main\DB\SqlExpression $moduleId)
     * @method bool hasModuleId()
     * @method bool isModuleIdFilled()
     * @method bool isModuleIdChanged()
     * @method \string remindActualModuleId()
     * @method \string requireModuleId()
     * @method \Ramapriya\Telegram\Entity\MessageHandler resetModuleId()
     * @method \Ramapriya\Telegram\Entity\MessageHandler unsetModuleId()
     * @method \string fillModuleId()
     * @method \string getHandlerClass()
     * @method \Ramapriya\Telegram\Entity\MessageHandler setHandlerClass(\string|\Bitrix\Main\DB\SqlExpression $handlerClass)
     * @method bool hasHandlerClass()
     * @method bool isHandlerClassFilled()
     * @method bool isHandlerClassChanged()
     * @method \string remindActualHandlerClass()
     * @method \string requireHandlerClass()
     * @method \Ramapriya\Telegram\Entity\MessageHandler resetHandlerClass()
     * @method \Ramapriya\Telegram\Entity\MessageHandler unsetHandlerClass()
     * @method \string fillHandlerClass()
     * @method \Ramapriya\Telegram\Entity\Bot getBot()
     * @method \Ramapriya\Telegram\Entity\Bot remindActualBot()
     * @method \Ramapriya\Telegram\Entity\Bot requireBot()
     * @method \Ramapriya\Telegram\Entity\MessageHandler setBot(\Ramapriya\Telegram\Entity\Bot $object)
     * @method \Ramapriya\Telegram\Entity\MessageHandler resetBot()
     * @method \Ramapriya\Telegram\Entity\MessageHandler unsetBot()
     * @method bool hasBot()
     * @method bool isBotFilled()
     * @method bool isBotChanged()
     * @method \Ramapriya\Telegram\Entity\Bot fillBot()
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
     * @method \Ramapriya\Telegram\Entity\MessageHandler set($fieldName, $value)
     * @method \Ramapriya\Telegram\Entity\MessageHandler reset($fieldName)
     * @method \Ramapriya\Telegram\Entity\MessageHandler unset($fieldName)
     * @method void addTo($fieldName, $value)
     * @method void removeFrom($fieldName, $value)
     * @method void removeAll($fieldName)
     * @method \Bitrix\Main\ORM\Data\Result delete()
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
     * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
     * @method static \Ramapriya\Telegram\Entity\MessageHandler wakeUp($data)
     */
    class EO_MessageHandler {
        /* @var \Ramapriya\Telegram\Entity\MessageHandlerTable */
        static public $dataClass = '\Ramapriya\Telegram\Entity\MessageHandlerTable';
        /**
         * @param bool|array $setDefaultValues
         */
        public function __construct($setDefaultValues = true) {}
    }
}
namespace Ramapriya\Telegram\Entity {
    /**
     * EO_MessageHandler_Collection
     *
     * Custom methods:
     * ---------------
     *
     * @method \int[] getIdList()
     * @method \int[] getBotIdList()
     * @method \int[] fillBotId()
     * @method \string[] getMessageList()
     * @method \string[] fillMessage()
     * @method \string[] getModuleIdList()
     * @method \string[] fillModuleId()
     * @method \string[] getHandlerClassList()
     * @method \string[] fillHandlerClass()
     * @method \Ramapriya\Telegram\Entity\Bot[] getBotList()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection getBotCollection()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection fillBot()
     *
     * Common methods:
     * ---------------
     *
     * @property-read \Bitrix\Main\ORM\Entity $entity
     * @method void add(\Ramapriya\Telegram\Entity\MessageHandler $object)
     * @method bool has(\Ramapriya\Telegram\Entity\MessageHandler $object)
     * @method bool hasByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\MessageHandler getByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\MessageHandler[] getAll()
     * @method bool remove(\Ramapriya\Telegram\Entity\MessageHandler $object)
     * @method void removeByPrimary($primary)
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection wakeUp($data)
     * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
     * @method void offsetSet() ArrayAccess
     * @method void offsetExists() ArrayAccess
     * @method void offsetUnset() ArrayAccess
     * @method void offsetGet() ArrayAccess
     * @method void rewind() Iterator
     * @method \Ramapriya\Telegram\Entity\MessageHandler current() Iterator
     * @method mixed key() Iterator
     * @method void next() Iterator
     * @method bool valid() Iterator
     * @method int count() Countable
     * @method EO_MessageHandler_Collection merge(?EO_MessageHandler_Collection $collection)
     * @method bool isEmpty()
     */
    class EO_MessageHandler_Collection implements \ArrayAccess, \Iterator, \Countable {
        /* @var \Ramapriya\Telegram\Entity\MessageHandlerTable */
        static public $dataClass = '\Ramapriya\Telegram\Entity\MessageHandlerTable';
    }
}
namespace Ramapriya\Telegram\Entity {
    /**
     * @method static EO_MessageHandler_Query query()
     * @method static EO_MessageHandler_Result getByPrimary($primary, array $parameters = [])
     * @method static EO_MessageHandler_Result getById($id)
     * @method static EO_MessageHandler_Result getList(array $parameters = [])
     * @method static EO_MessageHandler_Entity getEntity()
     * @method static \Ramapriya\Telegram\Entity\MessageHandler createObject($setDefaultValues = true)
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection createCollection()
     * @method static \Ramapriya\Telegram\Entity\MessageHandler wakeUpObject($row)
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection wakeUpCollection($rows)
     */
    class MessageHandlerTable extends \Bitrix\Main\ORM\Data\DataManager {}
    /**
     * Common methods:
     * ---------------
     *
     * @method EO_MessageHandler_Result exec()
     * @method \Ramapriya\Telegram\Entity\MessageHandler fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection fetchCollection()
     *
     * Custom methods:
     * ---------------
     *
     */
    class EO_MessageHandler_Query extends \Bitrix\Main\ORM\Query\Query {}
    /**
     * @method \Ramapriya\Telegram\Entity\MessageHandler fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection fetchCollection()
     */
    class EO_MessageHandler_Result extends \Bitrix\Main\ORM\Query\Result {}
    /**
     * @method \Ramapriya\Telegram\Entity\MessageHandler createObject($setDefaultValues = true)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection createCollection()
     * @method \Ramapriya\Telegram\Entity\MessageHandler wakeUpObject($row)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection wakeUpCollection($rows)
     */
    class EO_MessageHandler_Entity extends \Bitrix\Main\ORM\Entity {}
}