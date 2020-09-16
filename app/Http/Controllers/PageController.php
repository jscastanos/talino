<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\Repositories\CategoryRepository;

class PageController extends Controller
{
    public function __construct(NewsRepository $newsRepository, CategoryRepository $categoryRepository)
    {
        $this->newsRepository = $newsRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function homepage()
    {
        $latestNews = $this->newsRepository->getLatestNews(null, null, 3);
        $popularNews = $this->newsRepository->getPopularNews(null, null, 'W', 6);
        $categories = $this->categoryRepository->allCategories();
        return view('pages.homepage', compact('latestNews', 'categories', 'popularNews'));
    }
}
