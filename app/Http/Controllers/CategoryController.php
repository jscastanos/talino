<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index($slug)
    {
        $categories = $this->repository
                            ->forSlug($slug);

        abort_unless($categories, 404, "Category ");

        return view('categories.index', compact('categories'));
    }
}
