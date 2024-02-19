<?php

/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\BotTable */
namespace Ramapriya\Telegram\Entity {
    /**
     * EO_Bot
     * @see \Ramapriya\Telegram\Entity\BotTable
     *
     * Custom methods:
     * ---------------
     *
     * @method \int getId()
     * @method \Ramapriya\Telegram\Entity\EO_Bot setId(\int|\Bitrix\Main\DB\SqlExpression $id)
     * @method bool hasId()
     * @method bool isIdFilled()
     * @method bool isIdChanged()
     * @method \string getApiToken()
     * @method \Ramapriya\Telegram\Entity\EO_Bot setApiToken(\string|\Bitrix\Main\DB\SqlExpression $apiToken)
     * @method bool hasApiToken()
     * @method bool isApiTokenFilled()
     * @method bool isApiTokenChanged()
     * @method \string remindActualApiToken()
     * @method \string requireApiToken()
     * @method \Ramapriya\Telegram\Entity\EO_Bot resetApiToken()
     * @method \Ramapriya\Telegram\Entity\EO_Bot unsetApiToken()
     * @method \string fillApiToken()
     * @method \string getName()
     * @method \Ramapriya\Telegram\Entity\EO_Bot setName(\string|\Bitrix\Main\DB\SqlExpression $name)
     * @method bool hasName()
     * @method bool isNameFilled()
     * @method bool isNameChanged()
     * @method \string remindActualName()
     * @method \string requireName()
     * @method \Ramapriya\Telegram\Entity\EO_Bot resetName()
     * @method \Ramapriya\Telegram\Entity\EO_Bot unsetName()
     * @method \string fillName()
     * @method ?\string getWebhookCustomUrl()
     * @method \Ramapriya\Telegram\Entity\EO_Bot setWebhookCustomUrl(?\string|\Bitrix\Main\DB\SqlExpression $webhookCustomUrl)
     * @method bool hasWebhookCustomUrl()
     * @method bool isWebhookCustomUrlFilled()
     * @method bool isWebhookCustomUrlChanged()
     * @method ?\string remindActualWebhookCustomUrl()
     * @method ?\string requireWebhookCustomUrl()
     * @method \Ramapriya\Telegram\Entity\EO_Bot resetWebhookCustomUrl()
     * @method \Ramapriya\Telegram\Entity\EO_Bot unsetWebhookCustomUrl()
     * @method ?\string fillWebhookCustomUrl()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection getMessageHandlers()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection requireMessageHandlers()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection fillMessageHandlers()
     * @method bool hasMessageHandlers()
     * @method bool isMessageHandlersFilled()
     * @method bool isMessageHandlersChanged()
     * @method void addToMessageHandlers(\Ramapriya\Telegram\Entity\EO_MessageHandler $messageHandler)
     * @method void removeFromMessageHandlers(\Ramapriya\Telegram\Entity\EO_MessageHandler $messageHandler)
     * @method void removeAllMessageHandlers()
     * @method \Ramapriya\Telegram\Entity\EO_Bot resetMessageHandlers()
     * @method \Ramapriya\Telegram\Entity\EO_Bot unsetMessageHandlers()
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
     * @method \Ramapriya\Telegram\Entity\EO_Bot set($fieldName, $value)
     * @method \Ramapriya\Telegram\Entity\EO_Bot reset($fieldName)
     * @method \Ramapriya\Telegram\Entity\EO_Bot unset($fieldName)
     * @method void addTo($fieldName, $value)
     * @method void removeFrom($fieldName, $value)
     * @method void removeAll($fieldName)
     * @method \Bitrix\Main\ORM\Data\Result delete()
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
     * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
     * @method static \Ramapriya\Telegram\Entity\EO_Bot wakeUp($data)
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
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection[] getMessageHandlersList()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection getMessageHandlersCollection()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection fillMessageHandlers()
     *
     * Common methods:
     * ---------------
     *
     * @property-read \Bitrix\Main\ORM\Entity $entity
     * @method void add(\Ramapriya\Telegram\Entity\EO_Bot $object)
     * @method bool has(\Ramapriya\Telegram\Entity\EO_Bot $object)
     * @method bool hasByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\EO_Bot getByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\EO_Bot[] getAll()
     * @method bool remove(\Ramapriya\Telegram\Entity\EO_Bot $object)
     * @method void removeByPrimary($primary)
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method static \Ramapriya\Telegram\Entity\EO_Bot_Collection wakeUp($data)
     * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
     * @method void offsetSet() ArrayAccess
     * @method void offsetExists() ArrayAccess
     * @method void offsetUnset() ArrayAccess
     * @method void offsetGet() ArrayAccess
     * @method void rewind() Iterator
     * @method \Ramapriya\Telegram\Entity\EO_Bot current() Iterator
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
     * @method static \Ramapriya\Telegram\Entity\EO_Bot createObject($setDefaultValues = true)
     * @method static \Ramapriya\Telegram\Entity\EO_Bot_Collection createCollection()
     * @method static \Ramapriya\Telegram\Entity\EO_Bot wakeUpObject($row)
     * @method static \Ramapriya\Telegram\Entity\EO_Bot_Collection wakeUpCollection($rows)
     */
    class BotTable extends \Bitrix\Main\ORM\Data\DataManager {}
    /**
     * Common methods:
     * ---------------
     *
     * @method EO_Bot_Result exec()
     * @method \Ramapriya\Telegram\Entity\EO_Bot fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection fetchCollection()
     *
     * Custom methods:
     * ---------------
     *
     */
    class EO_Bot_Query extends \Bitrix\Main\ORM\Query\Query {}
    /**
     * @method \Ramapriya\Telegram\Entity\EO_Bot fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection fetchCollection()
     */
    class EO_Bot_Result extends \Bitrix\Main\ORM\Query\Result {}
    /**
     * @method \Ramapriya\Telegram\Entity\EO_Bot createObject($setDefaultValues = true)
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection createCollection()
     * @method \Ramapriya\Telegram\Entity\EO_Bot wakeUpObject($row)
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection wakeUpCollection($rows)
     */
    class EO_Bot_Entity extends \Bitrix\Main\ORM\Entity {}
}
/* ORMENTITYANNOTATION:Ramapriya\Telegram\Entity\MessageHandlerTable */
namespace Ramapriya\Telegram\Entity {
    /**
     * EO_MessageHandler
     * @see \Ramapriya\Telegram\Entity\MessageHandlerTable
     *
     * Custom methods:
     * ---------------
     *
     * @method \int getId()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler setId(\int|\Bitrix\Main\DB\SqlExpression $id)
     * @method bool hasId()
     * @method bool isIdFilled()
     * @method bool isIdChanged()
     * @method \int getBotId()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler setBotId(\int|\Bitrix\Main\DB\SqlExpression $botId)
     * @method bool hasBotId()
     * @method bool isBotIdFilled()
     * @method bool isBotIdChanged()
     * @method \int remindActualBotId()
     * @method \int requireBotId()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler resetBotId()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler unsetBotId()
     * @method \int fillBotId()
     * @method \string getMessage()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler setMessage(\string|\Bitrix\Main\DB\SqlExpression $message)
     * @method bool hasMessage()
     * @method bool isMessageFilled()
     * @method bool isMessageChanged()
     * @method \string remindActualMessage()
     * @method \string requireMessage()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler resetMessage()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler unsetMessage()
     * @method \string fillMessage()
     * @method \string getModuleId()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler setModuleId(\string|\Bitrix\Main\DB\SqlExpression $moduleId)
     * @method bool hasModuleId()
     * @method bool isModuleIdFilled()
     * @method bool isModuleIdChanged()
     * @method \string remindActualModuleId()
     * @method \string requireModuleId()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler resetModuleId()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler unsetModuleId()
     * @method \string fillModuleId()
     * @method \string getHandlerClass()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler setHandlerClass(\string|\Bitrix\Main\DB\SqlExpression $handlerClass)
     * @method bool hasHandlerClass()
     * @method bool isHandlerClassFilled()
     * @method bool isHandlerClassChanged()
     * @method \string remindActualHandlerClass()
     * @method \string requireHandlerClass()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler resetHandlerClass()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler unsetHandlerClass()
     * @method \string fillHandlerClass()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection getBot()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection requireBot()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection fillBot()
     * @method bool hasBot()
     * @method bool isBotFilled()
     * @method bool isBotChanged()
     * @method void addToBot(\Ramapriya\Telegram\Entity\EO_Bot $bot)
     * @method void removeFromBot(\Ramapriya\Telegram\Entity\EO_Bot $bot)
     * @method void removeAllBot()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler resetBot()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler unsetBot()
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
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler set($fieldName, $value)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler reset($fieldName)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler unset($fieldName)
     * @method void addTo($fieldName, $value)
     * @method void removeFrom($fieldName, $value)
     * @method void removeAll($fieldName)
     * @method \Bitrix\Main\ORM\Data\Result delete()
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method mixed[] collectValues($valuesType = \Bitrix\Main\ORM\Objectify\Values::ALL, $fieldsMask = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL)
     * @method \Bitrix\Main\ORM\Data\AddResult|\Bitrix\Main\ORM\Data\UpdateResult|\Bitrix\Main\ORM\Data\Result save()
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler wakeUp($data)
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
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection[] getBotList()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection getBotCollection()
     * @method \Ramapriya\Telegram\Entity\EO_Bot_Collection fillBot()
     *
     * Common methods:
     * ---------------
     *
     * @property-read \Bitrix\Main\ORM\Entity $entity
     * @method void add(\Ramapriya\Telegram\Entity\EO_MessageHandler $object)
     * @method bool has(\Ramapriya\Telegram\Entity\EO_MessageHandler $object)
     * @method bool hasByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler getByPrimary($primary)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler[] getAll()
     * @method bool remove(\Ramapriya\Telegram\Entity\EO_MessageHandler $object)
     * @method void removeByPrimary($primary)
     * @method void fill($fields = \Bitrix\Main\ORM\Fields\FieldTypeMask::ALL) flag or array of field names
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection wakeUp($data)
     * @method \Bitrix\Main\ORM\Data\Result save($ignoreEvents = false)
     * @method void offsetSet() ArrayAccess
     * @method void offsetExists() ArrayAccess
     * @method void offsetUnset() ArrayAccess
     * @method void offsetGet() ArrayAccess
     * @method void rewind() Iterator
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler current() Iterator
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
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler createObject($setDefaultValues = true)
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection createCollection()
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler wakeUpObject($row)
     * @method static \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection wakeUpCollection($rows)
     */
    class MessageHandlerTable extends \Bitrix\Main\ORM\Data\DataManager {}
    /**
     * Common methods:
     * ---------------
     *
     * @method EO_MessageHandler_Result exec()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection fetchCollection()
     *
     * Custom methods:
     * ---------------
     *
     */
    class EO_MessageHandler_Query extends \Bitrix\Main\ORM\Query\Query {}
    /**
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler fetchObject()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection fetchCollection()
     */
    class EO_MessageHandler_Result extends \Bitrix\Main\ORM\Query\Result {}
    /**
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler createObject($setDefaultValues = true)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection createCollection()
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler wakeUpObject($row)
     * @method \Ramapriya\Telegram\Entity\EO_MessageHandler_Collection wakeUpCollection($rows)
     */
    class EO_MessageHandler_Entity extends \Bitrix\Main\ORM\Entity {}
}