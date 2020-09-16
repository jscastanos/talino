<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//general pages
Route::name('pages.homepage')->get('/', 'PageController@homepage');

//news
Route::name('news.popular')->get('news/popular', 'NewsController@popular');
Route::name('news.show')->get('news/{slug}', 'NewsController@show');
Route::name('news.moreLatest')->get('news/view/{view}/{size}/{skip?}', 'NewsController@loadMoreLatestNews');

//categories
Route::name('categories.index')->get('categories/{slug}', 'CategoryController@index');
