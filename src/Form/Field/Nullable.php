<?php

namespace Zx\Admin\Form\Field;

use Zx\Admin\Form\Field;

class Nullable extends Field
{
    public function __construct()
    {
    }

    public function __call($method, $parameters)
    {
        return $this;
    }

    public function render()
    {
    }
}
