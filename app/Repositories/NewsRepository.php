<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use A17\Twill\Repositories\CategoryRepository;
use App\Models\News;

class NewsRepository extends ModuleRepository
{
    use HandleBlocks, HandleSlugs, HandleMedias;

    public function __construct(News $model)
    {
        $this->model = $model;
    }


    public function getLatestNews($current_news_id)
    {
        return $this->model
            ->published()
            ->where('id' , '!=', $current_news_id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
    }

    public function getLatestNewsByCurrentCategory($current_news_id, $category_id)
    {
        return $this->model
            ->published()
            ->where('id' , '!=', $current_news_id)
            ->where('category_id', '=', $category_id)
            ->orderBy('created_at', 'desc')
            ->take(4)
            ->get();
    }

}
