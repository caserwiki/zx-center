<?php

namespace Zx\Admin\Grid\Filter;

class Month extends Date
{
    /**
     * {@inheritdoc}
     */
    protected $query = 'whereMonth';

    /**
     * @var string
     */
    protected $fieldName = 'month';
}
