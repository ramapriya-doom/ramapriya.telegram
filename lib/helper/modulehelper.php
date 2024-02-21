<?php

namespace Ramapriya\Telegram\Helper;

use Bitrix\Main\Application;
use Ramapriya\Telegram\Contracts\IModule;

class ModuleHelper implements IModule
{
    public static function getModulePath(bool $absolute = true): string
    {
        $modulePath = dirname(__DIR__, 2);
        return !$absolute ? str_ireplace(Application::getDocumentRoot(), '', $modulePath) : $modulePath;
    }
}