<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Branch;

class BranchRepository extends ModuleRepository
{
    use HandleSlugs;

    public function __construct(Branch $model)
    {
        $this->model = $model;
    }
}
