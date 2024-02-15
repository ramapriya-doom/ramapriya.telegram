<?php

namespace Ramapriya\Telegram\Contracts\Service;

use Telegram\Bot\Keyboard\Keyboard;

/**
 * Интерфейс для формирования параметров сообщения, отправляемого telegram-ботом
 */
interface MessageParamsInterface
{
    /**
     * Заполнение массива для отправки сообщения
     * @return $this
     */
    public function fillMessageParams(): static;

    /**
     * Добавление клавиатуры в сообщение
     * @return $this
     */
    public function fillKeyboard(): static;

    public function getMessageParams(): array;

    public function getChatId(): int;

    public function getMessageText(): string;

    /**
     * Флаг использования клавиатуры в сообщении
     * @return bool
     */
    public function canUseKeyboard(): bool;

    public function getKeyboard(): ?Keyboard;
}