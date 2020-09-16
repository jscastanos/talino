<?php

namespace App\Http\Controllers;

use Response;
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
        $news = $this->repository->forSlug($slug);
        abort_unless($news, 404, 'News ');

        // increment page visit
        $this->repository->addPageVisit($news->id);

        // get  news
        $latestNews = $this->repository->getLatestNews($news->id);

        // get latest news  category
        $latestNewsByCategory = $this->repository->getLatestNews($news->id, $news->category_id);

        // get popular news
        $popularNews = $this->repository->getPopularNews($news->id);

        return view('news.show', compact('news', 'latestNews', 'latestNewsByCategory', 'popularNews'));
    }

    public function popular()
    {
        $popularNewsWeek = $this->repository->getPopularNews(null, null, 'W', 6);

        $popularNewsMonth = $this->repository->getPopularNews(null, null, 'M', 6);

        return view('news.popular', compact('popularNewsWeek', 'popularNewsMonth'));
    }

    private function renderPartialHtml($partial_view, $latestNews)
    {
        $list = [];
        foreach($latestNews as $news){
            $html = view($partial_view)->with('news', $news)->render();
            $list[] = $html;
        }

        return $list;
    }

    public function loadMoreLatestNews($partial_view, $size, $skip = 0)
    {
        $latestNews = $this->repository->getLatestNews(null, null, $size, $skip);

        return response()->json([
            'list' => $this->renderPartialHtml($partial_view, $latestNews),
            'length' => count($latestNews)
        ]);
    }
}
