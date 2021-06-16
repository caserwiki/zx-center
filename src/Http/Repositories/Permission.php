<?php

namespace Zx\Admin\Http\Repositories;

use Zx\Admin\Repositories\EloquentRepository;

class Permission extends EloquentRepository
{
    public function __construct()
    {
        $this->eloquentClass = config('admin.database.permissions_model');

        parent::__construct();
    }
}
