<?php

namespace Ramapriya\Telegram\Service\Adapter;

use Bitrix\Main\Error;
use Bitrix\Main\Result;
use Ramapriya\Telegram\Contracts\Service\TelegramInterface;
use Telegram\Bot\Api;
use Telegram\Bot\Exceptions\TelegramSDKException;

/**
 * Адаптер для библиотеки `irazasyed/telegram-bot-sdk`
 * @link https://github.com/irazasyed/telegram-bot-sdk
 */
class TelegramApiAdapter implements TelegramInterface
{
    private Result $result;
    private Api $client;
    public function __construct(private readonly string $botToken)
    {
        if (!class_exists('\\Telegram\\Bot\\Api')) {
            throw new \Exception('Package "irazasyed/telegram-bot-sdk" not installed');
        }

        $this->result = new Result();
        $this->client = new Api($this->botToken);
    }

    public function getBotToken(): string
    {
        return $this->botToken;
    }

    public function sendMessage(array $params): Result
    {
        $result = new Result();

        try {
            $message = $this->client->sendMessage($params);
            $result->setData($message->getRawResponse());
        } catch (TelegramSDKException $e) {
            $result->addError(
                new Error($e->getMessage(), $e->getCode(), ['exception' => $e])
            );
        } finally {
            return $result;
        }
    }

    public function getMe(): Result
    {
        $botInfo = $this->client->getMe();
        $result = new Result();
        $result->setData($botInfo->getRawResponse());

        return $result;
    }

    public function getFile(string $fileId): Result
    {

        $result = new Result();

        try {

            $file = $this->client->getFile(['file_id' => $fileId]);
            $result->setData($file->getRawResponse());
        } catch (TelegramSDKException $e) {
            $result->addError(
                new Error($e->getMessage(), $e->getCode(), ['exception' => $e])
            );
        } finally {
            return $result;
        }
    }

    public function getWebhookInfo(): Result
    {
        $result = new Result();

        try {
            $info = $this->client->getWebhookInfo();
            $result->setData($info->getRawResponse());
        } catch (TelegramSDKException $e) {
            $result->addError(
                new Error($e->getMessage(), $e->getCode(), ['exception' => $e])
            );
        } finally {
            return $result;
        }
    }

    public function setWebhook(array $params): Result
    {
        $result = new Result();
        try {
            $setWebhook = $this->client->setWebhook($params);
            if (is_array($setWebhook)) {
                $result->setData($setWebhook);
            }
        } catch (TelegramSDKException $e) {
            $result->addError(
                new Error($e->getMessage(), $e->getCode(), ['exception' => $e])
            );
        } finally {
            return $result;
        }
    }

    public function deleteWebhook(): Result
    {
        $result = new Result();

        try {
            $deleteWebhook = $this->client->deleteWebhook();
            if (is_array($deleteWebhook)) {
                $result->setData($deleteWebhook);
            }
        } catch (TelegramSDKException $e) {
            $result->addError(
                new Error($e->getMessage(), $e->getCode(), ['exception' => $e])
            );
        } finally {
            return $result;
        }
    }
}