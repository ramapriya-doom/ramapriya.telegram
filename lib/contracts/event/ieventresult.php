<?php

namespace Ramapriya\Telegram\Contracts\Event;

use Telegram\Bot\Commands\CommandInterface;

interface IEventResult
{
    public function getCommand(): CommandInterface|string;

    public function isNeedToReplace(): bool;
}