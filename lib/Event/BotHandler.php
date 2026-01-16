<?php

namespace Ramapriya\Telegram\Event;

use Bitrix\Main\DI\ServiceLocator;
use Bitrix\Main\Engine\UrlManager;
use Bitrix\Main\Event;
use Bitrix\Main\NotImplementedException;
use Bitrix\Main\ORM\EventResult;
use Ramapriya\Telegram\Contracts\Service\TelegramInterface;
use Ramapriya\Telegram\Entity\Bot\Bot;
use Ramapriya\Telegram\Entity\Bot\BotTable;
use Ramapriya\Telegram\Entity\Update\UpdateTable;
use Ramapriya\Telegram\Entity\User\UserTable;
use Ramapriya\Telegram\Entity\UserBot\UserBotTable;
use Ramapriya\Telegram\Service\Adapter\DefaultTelegramAdapter;

class BotHandler
{
    private EventResult $result;
    private TelegramInterface $telegram;
    private ?Bot $object = null;
    private int $id;

    public function __construct(private readonly Event $event)
    {
        $this->result = new EventResult();

        $this->setId();
        $this->setObject();
        $this->setTelegram();
    }

    private function setId(): void
    {
        $id = $this->event->getParameter('id');

        if (is_array($id) && array_key_exists('ID', $id)) {
            $this->id = (int)$id['ID'];
        } else {
            $this->id = $id;
        }
    }

    private function setObject(): void
    {
        if ($this->event->getParameter('object') !== null) {
            $this->object = $this->event->getParameter('object');
            if (!$this->object->getToken()) {
                $this->object->fillToken();
            }
            return;
        }

        $this->object = BotTable::getById($this->id)->fetchObject();
    }

    private function setTelegram(): void
    {
        $container = ServiceLocator::getInstance();
        $this->telegram = $container->has(TelegramInterface::OBJECT_KEY) ? $container->get(TelegramInterface::OBJECT_KEY) : new DefaultTelegramAdapter($this->object->getToken());

        if (!$this->telegram instanceof TelegramInterface) {
            throw new NotImplementedException('Service must be implement of \Ramapriya\Telegram\Contracts\Service\TelegramInterface');
        }
    }

    public function saveBotInfo(): static
    {
        $info = $this->telegram->getMe()->getData();
        $object = UserTable::getById($info['id'])->fetchObject() ?? UserTable::createObject();
        $entity = UserTable::getEntity();

        foreach ($info as $key => $value) {
            if ($key === 'id' && $object->getId() === $value) {
                continue;
            }

            $field = strtoupper($key);
            if (!$entity->hasField($field)) {
                continue;
            }

            $object->set($field, $value);
        }

        $result = $object->save();
        if (!$result->isSuccess()) {
            $this->result->setErrors($result->getErrors());
        }

        return $this;
    }

    public function setWebhook(): static
    {
        $urlManager = UrlManager::getInstance();
        $webhook = $urlManager->create(
            'ramapriya:telegram.api.WebhookController.handleWebhook',
            ['botId' => $this->object->getId()],
            true
        );
        $params = ['url' => (string) $webhook];

        $result = $this->telegram->setWebhook($params);

        if (!$result->isSuccess()) {
            $this->result->setErrors($result->getErrors());
        }

        return $this;
    }

    public function deleteReferences(): static
    {
        $deleteBot = UserTable::delete($this->object->getId());
        if (!$deleteBot->isSuccess()) {
            $this->result->setErrors($deleteBot->getErrors());
        }

        $references = UserBotTable::getList([
            'filter' => ['BOT_ID' => $this->object->getId()],
            'select' => ['USER_ID', 'BOT_ID']
        ])->fetchAll();

        foreach ($references as $primary) {
            $deleteUserBot = UserBotTable::delete($primary);
            if (!$deleteUserBot->isSuccess()) {
                $this->result->setErrors($deleteUserBot->getErrors());
            }
        }

        $updates = UpdateTable::getList([
            'filter' => ['BOT_ID' => $this->object->getId()],
            'select' => ['ID']
        ])->fetchCollection()->getIdList();

        foreach ($updates as $updateId) {
            $deleteUpdate = UpdateTable::delete($updateId);
            if (!$deleteUpdate->isSuccess()) {
                $this->result->setErrors($deleteUpdate->getErrors());
            }
        }

        return $this;
    }

    public function deleteWebhook(): static
    {
        $result = $this->telegram->deleteWebhook();

        if (!$result->isSuccess()) {
            $this->result->setErrors($result->getErrors());
        }

        return $this;
    }
    public function getResult(): EventResult
    {
        return $this->result;
    }
}