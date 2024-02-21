<?php

namespace Ramapriya\Telegram\Controller;

use Bitrix\Main\Engine\ActionFilter;
use Bitrix\Main\Engine\Controller;
use Ramapriya\Telegram\Service\Ajax\GridAdmin;

class GridAdminAction extends Controller
{
    protected function getDefaultPreFilters(): array
    {
        return [
            new ActionFilter\HttpMethod([ActionFilter\HttpMethod::METHOD_POST])
        ];
    }

    public function deleteItemAction(string $tableName, int $itemId): array
    {
        $service = new GridAdmin('delete', $tableName, $itemId);
        return [
            'request' => $this->request->toArray()
        ];
    }
}