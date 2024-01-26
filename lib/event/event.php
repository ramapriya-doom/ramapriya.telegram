<?php

namespace Ramapriya\Telegram\Event;

use Ramapriya\Telegram\Contracts\IModule;

class Event extends \Bitrix\Main\Event implements IModule
{
    public function __construct($type)
    {
        parent::__construct(self::MODULE_ID, $type);
    }
}