<?php

namespace Ramapriya\Telegram\Service;

use Bitrix\Main;
use Ramapriya\Telegram\Contracts\Service\TelegramInterface;
use Ramapriya\Telegram\Entity\Bot;

class Webhook
{
    use UpdateTrait;
    private TelegramInterface $telegram;
    private Main\Result $result;
    private string $apiUrl = 'https://api.telegram.org/';

    public function __construct(
        private readonly string $token,
        private readonly array $update
    ) {
        $this->result = new Main\Result();

        $this->setTelegram();
        $this->parseUpdate($this->update);
    }

    private function setTelegram(): void
    {
        $serviceLocator = Main\DI\ServiceLocator::getInstance();
        $this->telegram = $serviceLocator->has(TelegramInterface::OBJECT_KEY) ?
            $serviceLocator->get(TelegramInterface::OBJECT_KEY) : new Adapter\DefaultTelegramAdapter($this->token, $this->apiUrl);

        if (!$this->telegram instanceof TelegramInterface) {
            throw new Main\NotImplementedException('Service must be implement of \Ramapriya\Telegram\Contracts\Service\TelegramInterface');
        }
    }

    public function handleWebhook(): Main\Result
    {
        $this->sendHandlersEvent();
        return $this->result;
    }

    /**
     * Данный метод отправляет событие `onBeforeHandleWebhookUpdate`, на которое нужно подписаться для обработки входящего запроса
     *
     * @return void
     *
     * @throws Main\ArgumentException
     * @throws Main\SystemException
     */
    private function sendHandlersEvent(): void
    {
        /**
         * @var Bot\Bot $bot
         */
        $bot = Bot\BotTable::getByToken($this->token, [
            'filter' => ['USER.IS_BOT' => true],
            'select' => ['ID', 'TOKEN', 'USER.USERNAME']
        ])->fetchObject();

        $parameters = [
            'update' => $this->update,
            'bot' => [
                'id' => $bot->getId(),
                'token' => $this->token,
                'username' => $bot->get('USER')->get('USERNAME')
            ],
            'telegram' => $this->telegram
        ];

        $event = new Main\Event('ramapriya.telegram', 'onBeforeHandleWebhookUpdate', $parameters);
        $event->send();
    }
}