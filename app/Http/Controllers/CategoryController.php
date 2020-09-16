<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $repository, NewsRepository $newsRepository)
    {
        $this->repository = $repository;
        $this->newsRepository = $newsRepository;
    }

    public function index($slug)
    {
        $categories = $this->repository->forSlug($slug);
        abort_unless($categories, 404, "Category ");

        $popularNews = $this->newsRepository->getPopularNews(null, $categories->id);
        return view('categories.index', compact('categories', 'popularNews'));
    }
}
