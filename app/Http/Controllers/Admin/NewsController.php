<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\CategoryRepository;

class NewsController extends ModuleController
{
    protected $moduleName = 'news';
    protected $formWith = ['category'];

    public function formData($request){
        $collection = app(CategoryRepository::class)->allCategories();
        $categories = $collection->map(function($item){
            return [
                'value' => $item['id'],
                'label' => $item['name']
            ];
        });

        return ['categories' => $categories->all()];
    }
}
