<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main\ORM\Objectify\EntityObject;
use Bitrix\Main\Result;
use Ramapriya\Telegram\Entity\UserBot\UserBotTable;
use Ramapriya\Telegram\Entity\User\UserTable;

class User
{
    use UpdateTrait;

    public function __construct(private readonly int $botId, private readonly array $update)
    {
        $this->parseUpdate($this->update);
    }

    private function getExistentUser(): EntityObject|\Ramapriya\Telegram\Entity\User\User|null
    {
        $query = UserTable::query();
        $query->where('ID', '=', $this->from['id']);
        $query->addSelect('*');

        return $query->exec()->fetchObject();
    }

    private function getExistentUserBotReference(): ?\Ramapriya\Telegram\Entity\UserBot\UserBot
    {
        $query = UserBotTable::query();

        $query->where('USER_ID', '=', $this->from['id']);
        $query->where('BOT_ID', '=', $this->botId);
        $query->setSelect(['USER_ID', 'BOT_ID']);
        return $query->exec()->fetchObject();
    }

    public function saveUserInDb(): Result
    {
        $object = $this->getExistentUser() ?? UserTable::createObject();
        $from = array_change_key_case($this->from, CASE_UPPER);
        $entity = UserTable::getEntity();

        foreach ($from as $key => $value) {
            if (!$entity->hasField($key)) {
                continue;
            }

            if (!empty($object->get($key)) && $object->get($key) == $value) {
                continue;
            }

            $object->set($key, $value);
        }

        $userResult = $object->save();
        $result = new Result();

        if (!$userResult->isSuccess()) {
            return $result->addErrors($userResult->getErrors());
        }

        $existentReference = $this->getExistentUserBotReference();
        if (!$existentReference) {
            $userBotResult = UserBotTable::add([
                'USER_ID' => $object->getId(),
                'BOT_ID' => $this->botId,
            ]);

            if (!$userBotResult->isSuccess()) {
                return $result->addErrors($userBotResult->getErrors());
            }
        }

        return $result;
    }
}