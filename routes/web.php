<?php

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

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ContentsArrController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FrontBlogController;
use App\Http\Controllers\ResultController;

Route::get('/', function () {
  return view('index');
})->name('top');

//Route::view('/news', 'news');
Route::view('/philosophy', 'philosophy')->name('philosophy');
Route::get('/case-study', 'ResultController@search')->name('case-study');
Route::get('/case-study/{id}','ResultController@show')->name('case-study-single');
Route::view('/feature', 'feature')->name('feature');
Route::view('/document-request', 'document-request')->name('document-request');
Route::view('/document-request/done/', 'document-request-done')->name('document-request-done');
Route::view('/contact', 'contact')->name('contact');
Route::view('/contact/done/', 'contact-done')->name('contact-done');
Route::view('/company-profile', 'company-profile')->name('company');
Route::get('/news','NewsController@index')->name('news');
Route::get('/news/{id}','NewsController@show')->name('news-single');
Route::get('/house/{id}','HouseController@show_house')->name('house-single');
Route::get('/house', 'HouseController@list')->name('house');

Route::group(['prefix'=>'blog'],function() {
  Route::get('/{id}','FrontBlogController@show')->name('blog-single');
  Route::get('/','FrontBlogController@index')->name('blog');
  Route::get('/category/{id}','FrontBlogController@category')->name('blog-category');
  Route::get('/recommend','FrontBlogController@recommend')->name('blog-recommend');
});

Route::group(['prefix' => 'admin'], function () {

  Route::get('/','Admin\DashBoardController@index');

  //News Backend Routes
  Route::get('/news/create', ['uses' => 'Admin\NewsController@create', 'as' => 'admin.news.create']);
  Route::post('/news', ['uses' => 'Admin\NewsController@store', 'as' => 'admin.news.store']);
  Route::get('/news',['uses'=>'Admin\NewsController@index','as'=>'admin.news.index']);
  Route::get('/news/show','Admin\NewsController@show');
  Route::post('/news/show',['uses' => 'Admin\NewsController@search','as' => 'admin.news.show.search']);
  Route::post('/news/update/{id}',['uses' => 'Admin\NewsController@update','as' => 'admin.news.update']);
  Route::delete('/news/{id}',['uses'=>'Admin\NewsController@destroy','as'=>'admin.news']);
  Route::get('news/edit/{id}',['uses'=>'Admin\NewsController@edit']);

  //blog Backend Routes
  Route::get('/blog/search','Admin\BlogController@search');
  Route::post('/blog/update/{id}','Admin\BlogController@update');
  Route::get('/blog_category','Admin\BlogController@category');
  Route::post('/blog_category/update/order','Admin\BlogController@updateOrder');
  Route::get('/blog_category/{id}/edit','Admin\BlogController@categoryEdit');
  Route::post('/blog/categoryAdd','Admin\BlogController@categoryAdd');
  Route::delete('/blog/category/delete/{id}','Admin\BlogController@categoryDelete');
  Route::post('/blog/category/update/{id}','Admin\BlogController@categoryUpdate');

  //House Backend Routes
  Route::resource('/housing','Admin\HousingController');
  Route::post('/housing/update/{id}','Admin\HousingController@update');
  Route::get('/housing_search','Admin\HousingController@search');

  //Results Backend Routes
  Route::post('/results/update/{id}','Admin\ResultController@update');
  Route::post('/results_area/update/order','Admin\AreaController@updateOrder');
  Route::post('/results_amount/update/order','Admin\AmountController@updateOrder');
  Route::post('/results_housetype/update/order','Admin\HouseTypeController@updateOrder');
  Route::get('/search_results','Admin\ResultController@search');
  Route::get('/results/list','Admin\ResultController@index');
  Route::resource('/blog', 'Admin\BlogController');
  Route::resource('/results_housetype','Admin\HouseTypeController');
  Route::resource('/results_amount','Admin\AmountController');
  Route::resource('/results_area','Admin\AreaController');
  Route::resource('/results','Admin\ResultController');

});