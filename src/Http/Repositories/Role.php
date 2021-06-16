<?php

namespace Zx\Admin\Http\Repositories;

use Zx\Admin\Repositories\EloquentRepository;

class Role extends EloquentRepository
{
    public function __construct($relations = [])
    {
        $this->eloquentClass = config('admin.database.roles_model');

        parent::__construct($relations);
    }
}
