<?php

namespace Ramapriya\Telegram\Controller;

use Bitrix\Main\Engine;
use Bitrix\Main\Error;
use Bitrix\Main\IO\File;
use Ramapriya\Telegram\Entity\Bot\BotTable;
use Ramapriya\Telegram\Entity\Update\UpdateTable;
use Ramapriya\Telegram\Service\User;
use Ramapriya\Telegram\Service\Webhook;

class WebhookController extends Engine\Controller
{
    public function configureActions()
    {
        return [
            'handleWebhook' => [
                '-prefilters' => [Engine\ActionFilter\Authentication::class, Engine\ActionFilter\Csrf::class],
            ]
        ];
    }

    public function handleWebhookAction(int $botId): ?Engine\Response\AjaxJson
    {
        $update = $this->getUpdate();
        $updateResult = UpdateTable::add([
            'BOT_ID' => $botId,
            'UPDATE' => $this->request->getInput(),
        ]);

        if (!$updateResult->isSuccess()) {
            $this->errorCollection->add($updateResult->getErrorMessages());
        };

        $bot = BotTable::getById($botId)->fetchObject();
        $userService = new User($botId, $update);
        $saveUserResult = $userService->saveUserInDb();
        if (!$saveUserResult->isSuccess()) {
            $this->errorCollection->add($saveUserResult->getErrors());
        };

        $handler = new Webhook($bot->getToken(), $update);
        $handleWebhookResult = $handler->handleWebhook();

        if (!$handleWebhookResult->isSuccess()) {
            $this->errorCollection->add($handleWebhookResult->getErrors());
        }

        if (!$this->errorCollection->isEmpty()) {
            $errorMessages = array_map(fn(Error $error) => $error->getMessage(), $this->errorCollection->toArray());
            File::putFileContents(
                $_SERVER['DOCUMENT_ROOT'] . '/logs/telegram/'.$update['update_id'].'.php',
                '<?php return ' . var_export($errorMessages, true) . ';'
            );
        }

        return !$this->errorCollection->isEmpty() ? Engine\Response\AjaxJson::createError($this->errorCollection) : Engine\Response\AjaxJson::createSuccess();
    }

    private function getUpdate()
    {
        return json_decode($this->request->getInput(), true);
    }
}