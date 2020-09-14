<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class BranchController extends ModuleController
{
    protected $moduleName = 'branches';
    protected $titleColumnKey = 'name';
}
