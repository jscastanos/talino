<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\BranchRepository;

class NewsController extends ModuleController
{
    protected $moduleName = 'news';

    protected $formWith = ['branch'];

    public function formData($request){
        $collection = app(BranchRepository::class)->published()->orderBy('name')->get();
        $branches = $collection->map(function($item){
            return [
                'value' => $item['id'],
                'label' => $item['name']
            ];
        });

        return ['branches' => $branches->all()];
    }
}
