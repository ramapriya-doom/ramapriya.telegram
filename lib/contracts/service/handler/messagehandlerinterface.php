<?php

namespace Ramapriya\Telegram\Contracts\Service\Handler;

/**
 * Интерфейс обработчиков сообщений telegram-боту
 */
interface MessageHandlerInterface
{
    /**
     * Обработка входящего сообщения и отправка ответа
     * @return mixed
     */
    public function handleMessage();
}