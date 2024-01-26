<?php

namespace Ramapriya\Telegram\Contracts\Builder;

use Telegram\Bot\Api as Telegram;

interface ITelegramBuilder
{
    public static function create(): Telegram;

    public function getTelegram(): Telegram;

    public function registerCommands(bool $replaceByName = false): static;
}