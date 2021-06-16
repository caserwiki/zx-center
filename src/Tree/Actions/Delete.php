<?php

namespace Zx\Admin\Tree\Actions;

use Zx\Admin\Tree\RowAction;

class Delete extends RowAction
{
    public function html()
    {
        $url = request()->fullUrl();

        return <<<HTML
<a href="javascript:void(0);" 
    data-message="ID - {$this->getKey()}" 
    data-redirect="{$url}"
    data-url="{$this->resource()}/{$this->getKey()}" data-action="delete"><i class="feather icon-trash"></i>&nbsp;</a>
HTML;
    }
}
