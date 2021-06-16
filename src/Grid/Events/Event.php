<?php

namespace Zx\Admin\Grid\Events;

use Zx\Admin\Grid;

abstract class Event
{
    /**
     * @var Grid
     */
    public $grid;

    public $payload = [];

    public function __construct(array $payload = [])
    {
        $this->payload = $payload;
    }

    public function setGrid(Grid $grid)
    {
        $this->grid = $grid;
    }
}
