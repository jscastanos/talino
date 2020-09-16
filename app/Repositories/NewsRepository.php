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

    public function addPageVisit($newsId)
    {
        $news = $this->model::findOrFail($newsId);
        $news->page_visit = $news->page_visit += 1;
        $news->last_page_visit = now();
        $news->save();

        return $news;
    }

    public function filteredNews($currentNewsId, $categoryId)
    {
        $latestNews = $this->model->published();
        // check newsId
        $latestNews = $currentNewsId != null ? $latestNews->where('id' , '!=', $currentNewsId)
                                            : $latestNews;
        // check categoryId
        $latestNews = $categoryId != null ? $latestNews->where('category_id', '=', $categoryId)
                                            : $latestNews;
        return $latestNews;
    }

    public function getLatestNews($currentNewsId = null, $categoryId = null, $count = 4, $skip = 0)
    {
        return $this->filteredNews($currentNewsId, $categoryId)
                    ->orderBy('created_at', 'desc')
                    ->skip($skip)
                    ->take($count)
                    ->get();
    }

    public function getPopularNews($currentNewsId = null, $categoryId = null, $type = 'W', $count = 4, $skip = 0)
    {
        // if W (week) then get last 7 days
        // if M (month) then get last 30 days excluding this week
        $from = $type == 'W' ? now()->subDay(6) : now()->subDay(37);
        $to = $type == 'W' ? now()->addDay(1) : now()->subDay(7);

        return $this->filteredNews($currentNewsId, $categoryId)
                    ->whereBetween('last_page_visit', [$from, $to])
                    ->orderBy('page_visit', 'desc')
                    ->skip($skip)
                    ->take($count)
                    ->get();
    }

}
