<?php

namespace Ramapriya\Telegram\Contracts;

interface IOptions extends IModule
{
    const BOT_API_TOKEN     = 'bot_api_token';
    const USE_ASYNC_REQUEST = 'use_async_requests';
    const NOTIFICATION_TIME = 'notification_time';
}