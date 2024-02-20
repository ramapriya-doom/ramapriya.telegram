<?php

namespace Ramapriya\Telegram\Facade\Admin;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Query\Query;
use Bitrix\UI\Toolbar\ButtonLocation;
use Bitrix\UI\Toolbar\Facade\Toolbar as BxToolbar;

abstract class Grid
{
    protected array $columns = [];
    protected array $rows = [];
    protected array $params = [];

    protected array $disabledParams = [];
    protected array $enabledParams = [];

    protected array $ormParams = [];


    protected DataManager|string|null $dataClass = null;
    protected Query|null $query = null;

    public function __construct(protected string $id)
    {
    }

    abstract public function fillColumns(): void;

    abstract public function fillRows(): void;

    abstract public function fillParams(): void;

    protected function fillQuery(): void
    {
        if (!$this->query || empty($this->ormParams)) {
            return;
        }

        if (!$this->ormParams['select']) {
            $this->ormParams['select'] = ['*'];
        }

        $this->query->setSelect($this->ormParams['select']);

        if ($this->ormParams['filter']) {
            $this->query->setFilter($this->ormParams['filter']);
        }

        if ($this->ormParams['order']) {
            $this->query->setOrder($this->ormParams['order']);
        }

        if ($this->ormParams['offset']) {
            $this->query->setOffset($this->ormParams['offset']);
        }

        if ($this->ormParams['limit']) {
            $this->query->setLimit($this->ormParams['limit']);
        }

        if ($this->ormParams['runtime']) {
            foreach ($this->ormParams['runtime'] as $runtimeField) {
                $this->query->registerRuntimeField($runtimeField);
            }
        }
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @return array
     */
    public function getRows(): array
    {
        return $this->rows;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param array $ormParams
     */
    public function setOrmParams(array $ormParams): void
    {
        $this->ormParams = $ormParams;
    }

    public function createToolbar(Toolbar $toolbar): void
    {
        if (!empty($toolbar->getFilter())) {
            BxToolbar::addFilter($toolbar->getFilter());
        }

        if (!empty($toolbar->getButtons())) {
            foreach ($toolbar->getButtons() as $button) {
                BxToolbar::addButton($button, ButtonLocation::AFTER_FILTER);
            }
        }
    }
}