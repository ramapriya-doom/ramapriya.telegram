# Интеграция Телеграм-бота и Bitrix framework

Данный модуль даёт возможность подключения неограниченного количества чат-ботов telegram к сайтам и порталам на 1С-Битрикс.

## Установка

Скачайте данный репозиторий в папку `/local/modules`

__Варианты установки:__

- Установить модуль в админке в разделе `Маркетплейс > Установленные решения`
- Запустить код:

```php
$module = \CModule::CreateModuleObject('ramapriya.telegram');
$module->DoInstall();
```

## Таблицы в базе данных

### telegram_user
В данной таблице хранятся данные пользователей и ботов.

ORM-сущность: `\Ramapriya\Telegram\Entity\User\UserTable`

| __Поле__ | __Тип данных__ | __Обязательный__ | __Описание__                        | __По умолчанию__ |
|---------|---------------|------------------|-------------------------------------|------|
|ID       | integer       | Да               | Идентификатор пользователя          |      |
|IS_BOT| boolean|                  | Флаг, является ли пользователь ботом | false                       |
|FIRST_NAME|string|Да| Имя                                 ||
|LAST_NAME|string|| Фамилия                             ||
|USERNAME|string|| Имя пользователя (`@username`)        ||
|LANGUAGE_CODE|string|| Код языка                           ||
|USER_ID|integer|| ID пользователя в битрикс           ||
|USER|reference||Связь с таблицей `b_user`||
|BOT|reference||Связь с таблицей `telegram_bot`||
|USER_BOT|reference|| Связь с таблицей `telegram_user_bot`||

### telegram_bot
В данной таблице хранятся токены ботов

ORM-сущность: `\Ramapriya\Telegram\Entity\Bot\BotTable`

| __Поле__ | __Тип данных__ | __Обязательный__ | __Описание__                       | __По умолчанию__ |
|----------|----------------|------------------|------------------------------------|------|
| ID       | integer        | Да               | Идентификатор бота                 |      |
| TOKEN    | string         | Да               | Токен                              | |
| USER     | reference      |                  | Связь с таблицей `telegram_user`     ||
| USER_BOT | reference      |                  | Связь с таблицей `telegram_user_bot` ||
| UPDATE   | reference      |                  | Связь с таблицей `telegram_update`   ||

### telegram_user_bot
В данной таблице хранятся связи пользователей и ботов

ORM-сущность: `\Ramapriya\Telegram\Entity\UserBot\UserBotTable`

| __Поле__ | __Тип данных__ | __Обязательный__ | __Описание__                               | __По умолчанию__ |
|----------|---------------|------------------|--------------------------------------------|------|
| USER_ID  |integer| Да               | ID пользователя из таблицы `telegram_user` ||
| BOT_ID   |integer| Да               | ID бота из таблицы `telegram_bot`          ||
| USER     |reference|                  | Связь с таблицей `telegram_user`           ||
| BOT      |reference|                  | Связь с таблицей `telegram_bot`            ||

### telegram_update
В данной таблице хранятся входящие запросы, присылаемые на вебхук

ORM-сущность: `\Ramapriya\Telegram\Entity\Update\UpdateTable`

| __Поле__ | __Тип данных__ | __Обязательный__ | __Описание__                                                          | __По умолчанию__ |
|----------|----------------|------------------|-----------------------------------------------------------------------|------|
| ID       | integer        || Первичный ключ                                                        ||
| BOT_ID   | integer        || ID бота из таблицы `telegram_bot`, которому пользователь шлёт сообщение ||
| UPDATE   | long_text      || json-строка входящего запроса, записывается как есть                  ||
| BOT      | reference      || Связь с таблицей `telegram_bot`                                         ||

## Использование

### Добавление бота

```php
$token = '0000000000:AAAAaBB-CCCCcccc1Dd_Ee2FfG3HHHhhhhI'
\Ramapriya\Telegram\Entity\Bot\BotTable::addByToken($token);
```

При использовании данного метода устанавливается вебхук, имеющий адрес
`https://<your_domain.name>/bitrix/services/main/ajax.php?action=ramapriya%3Atelegram.api.WebhookController.handleWebhook&SITE_ID=s1&botId=<BOT_ID>`.

При получении запроса контроллер выполняет следующие действия:

* сохранение запроса в таблицу `telegram_update`
* сохранение пользователя, отправившего сообщение, в таблицы `telegram_user` и `telegram_user_bot`
* обработка входящего запроса

## Сохранение данных в таблицы

Стадартные операции, в основе которых лежат ORM-запросы. Можно подписаться на ORM-события для использования сохраняемых данных по своему усмотрению.

## Обработка входящего запроса

После сохранения данных в базу создаётся объект класса `\Ramapriya\Telegram\Service\Webhook`, который запускает событие `onBeforeHandleWebhookUpdate`. Для обработки сообщения или ответа на него нужно подписаться на данное событие:

```php
// Код реализации не играет здесь большой роли

$eventManager->addEventHandler(
    'ramapriya.telegram', 
    'onBeforeHandleWebhookUpdate', 
    function (\Bitrix\Main\Event $event) {
        /**
         * @var array $update входящий запрос, прилетающий на вебхук из телеграм
         */
        $update = $event->getParameter('update');
    
        /**
         * @var array{id: string, token: string, username: string} $bot массив основных данных бота
         */
        $bot = $event->getParameter('bot');
        
        /**
         * @var \Ramapriya\Telegram\Contracts\Service\TelegramInterface $telegram
         */
        $telegram = $event->getParameter('telegram');
        
        // код обработки входящего запроса...
        
        $result = new \Bitrix\Main\EventResult(\Bitrix\Main\EventResult::SUCCESS);
        $event->addResult($result);
    }
);
```

Обязательно используйте для проверки данные бота (id, токен, username и др.), а также другие условия при необходимости. Иначе, в случае использования нескольких ботов, ваши сервисы будут обрабатывать ВСЕ входящие запросы!

## Сервис для непосредственной работы с Telegram API

За работу с telegram API отвечает интерфейс `\Ramapriya\Telegram\Contracts\Service\TelegramInterface`, и по умолчанию в модуле его реализуют 2 класса:

* `\Ramapriya\Telegram\Service\Adapter\DefaultTelegramAdapter` - адаптер, использующий API Bitrix Framework
* `\Ramapriya\Telegram\Service\Adapter\TelegramApiAdapter` - адаптер, использующий библиотеку [irazasyed/telegram-bot-sdk](https://github.com/irazasyed/telegram-bot-sdk)

Также есть возможность использования своего сервиса. Для этого нужно в сервис-локатор положить инстанс объекта, реализующего вышеупомянутый интерфейс:

```php

class MyTelegramService implements \Ramapriya\Telegram\Contracts\Service\TelegramInterface
{
     // тело класса
}

$service = new MyTelegramService();
$container = \Bitrix\Main\DI\ServiceLocator::getInstance();
$container->addInstance(\Ramapriya\Telegram\Contracts\Service\TelegramInterface::OBJECT_KEY, $service);

```


