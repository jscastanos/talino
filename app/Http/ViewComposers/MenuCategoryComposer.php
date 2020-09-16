<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;

class MenuCategoryComposer
{
    public $menuCategoryList = [];
    /**
     * Create a menu category composer.
     *
     * @return void
     */
    public function __construct(CategoryRepository $categoryRepository, NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository->getPopularNews(null, null, 'W', 5);
        $this->menuCategoryList = $categoryRepository->allCategories();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('menuCategory', end($this->menuCategoryList));
        $view->with('popularNews', end($this->newsRepository));
    }
}
