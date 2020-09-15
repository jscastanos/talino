<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Repositories\CategoryRepository;

class NewsController extends Controller
{
    public function __construct(NewsRepository $repository, CategoryRepository $categoryRepository)
    {
        $this->repository = $repository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {
        $news = $this->repository
                    ->forSlug($slug);

        abort_unless($news, 404, 'News ');

        // latest
        $latest_news = $this->repository
                            ->getLatestNews($news->id);

        // latest by category
        $latest_news_by_category = $this->repository
                                        ->getLatestNewsByCurrentCategory($news->id, $news->category_id);

        return view('news.show', compact('news', 'latest_news', 'latest_news_by_category'));
    }
}
