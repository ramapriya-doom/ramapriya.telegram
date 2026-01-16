<?php

namespace Ramapriya\Telegram\Contracts\Service;

use Bitrix\Main\Result;

/**
 * Интерфейс основного функционала взаимодействия с ботом (отправка сообщений, установление вебхука и т.д.)
 * Необходимо положить инстанс в сервис-локатор
 */
interface TelegramInterface
{
    public const OBJECT_KEY = 'ramapriya.telegram.service';

    public function getBotToken(): string;

    public function sendMessage(array $params);

    public function getMe(): Result;

    public function getFile(string $fileId): Result;

    public function getWebhookInfo(): Result;

    public function setWebhook(array $params): Result;

    public function deleteWebhook(): Result;
}