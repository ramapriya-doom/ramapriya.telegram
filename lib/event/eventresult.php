<?php

namespace Ramapriya\Telegram\Event;

use Ramapriya\Telegram\Contracts\Event\IEventResult;
use Telegram\Bot\Commands\CommandInterface;

class EventResult extends \Bitrix\Main\EventResult implements IEventResult
{
    public function __construct(private readonly CommandInterface|string $command, private readonly bool $needToReplace = true)
    {
        parent::__construct(self::SUCCESS);
    }

    /**
     * @return string|CommandInterface
     */
    public function getCommand(): CommandInterface|string
    {
        return $this->command;
    }

    /**
     * @return bool
     */
    public function isNeedToReplace(): bool
    {
        return $this->needToReplace;
    }
}