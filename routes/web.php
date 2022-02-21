<?php

use Illuminate\Support\Facades\Route;


//Admin
Route::prefix('admin')->middleware('isLogout')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::get('logout', 'App\Http\Controllers\Admin\LoginController@logout');
    Route::get('dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
    Route::get('service', 'App\Http\Controllers\Admin\ServiceController@index');
    Route::get('service/add', 'App\Http\Controllers\Admin\ServiceController@index_add');    
    Route::post('service/add', 'App\Http\Controllers\Admin\ServiceController@post_add');    
    Route::get('service/delete/{id}', 'App\Http\Controllers\Admin\ServiceController@destroy');    
    Route::get('service/edit/{id}', 'App\Http\Controllers\Admin\ServiceController@edit');    
    Route::post('service/edit/{id}', 'App\Http\Controllers\Admin\ServiceController@post_edit');

    Route::get('action', 'App\Http\Controllers\Admin\ActionController@index');
    Route::get('action/add', 'App\Http\Controllers\Admin\ActionController@index_add');    
    Route::post('action/add', 'App\Http\Controllers\Admin\ActionController@post_add');    
    Route::get('action/delete/{id}', 'App\Http\Controllers\Admin\ActionController@destroy');    
    Route::get('action/edit/{id}', 'App\Http\Controllers\Admin\ActionController@edit');    
    Route::post('action/edit/{id}', 'App\Http\Controllers\Admin\ActionController@post_edit');
    
    
    Route::get('about', 'App\Http\Controllers\Admin\AboutController@index');    
    Route::get('about/edit', 'App\Http\Controllers\Admin\AboutController@edit');    
    Route::post('about/edit', 'App\Http\Controllers\Admin\AboutController@post_edit');


    Route::get('partners', 'App\Http\Controllers\Admin\PartnerController@index');
    Route::get('partners/add', 'App\Http\Controllers\Admin\PartnerController@index_add');
    Route::post('partners/add', 'App\Http\Controllers\Admin\PartnerController@post_add');
    Route::get('partner/edit/{id}', 'App\Http\Controllers\Admin\PartnerController@edit');
    Route::post('partner/edit/{id}', 'App\Http\Controllers\Admin\PartnerController@post_edit');
    Route::get('partner/delete/{id}', 'App\Http\Controllers\Admin\PartnerController@destroy');

    Route::get('category', 'App\Http\Controllers\Admin\CategoryController@index');
    Route::get('category/add', 'App\Http\Controllers\Admin\CategoryController@index_add');
    Route::post('category/add', 'App\Http\Controllers\Admin\CategoryController@post_add');
    Route::get('category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
    Route::post('category/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@post_edit');
    Route::get('category/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@destroy');


    Route::get('brands', 'App\Http\Controllers\Admin\BrandController@index');
    Route::get('brands/add', 'App\Http\Controllers\Admin\BrandController@index_add');
    Route::post('brands/add', 'App\Http\Controllers\Admin\BrandController@post_add');
    Route::get('brands/edit/{id}', 'App\Http\Controllers\Admin\BrandController@edit');
    Route::post('brands/edit/{id}', 'App\Http\Controllers\Admin\BrandController@post_edit');
    Route::get('brands/delete/{id}', 'App\Http\Controllers\Admin\BrandController@destroy');

    Route::get('groups', 'App\Http\Controllers\Admin\GroupController@index');
    Route::get('groups/add', 'App\Http\Controllers\Admin\GroupController@index_add');
    Route::post('groups/add', 'App\Http\Controllers\Admin\GroupController@post_add');
    Route::get('groups/edit/{id}', 'App\Http\Controllers\Admin\GroupController@edit');
    Route::post('groups/edit/{id}', 'App\Http\Controllers\Admin\GroupController@post_edit');
    Route::get('groups/delete/{id}', 'App\Http\Controllers\Admin\GroupController@destroy');

    Route::get('teams', 'App\Http\Controllers\Admin\TeamController@index');
    Route::get('teams/add', 'App\Http\Controllers\Admin\TeamController@index_add');
    Route::post('teams/add', 'App\Http\Controllers\Admin\TeamController@post_add');
    Route::get('teams/edit/{id}', 'App\Http\Controllers\Admin\TeamController@edit');
    Route::post('teams/edit/{id}', 'App\Http\Controllers\Admin\TeamController@post_edit');
    Route::get('teams/delete/{id}', 'App\Http\Controllers\Admin\TeamController@destroy');

    Route::get('reklam', 'App\Http\Controllers\Admin\ReklamController@index');
    Route::get('reklam/add', 'App\Http\Controllers\Admin\ReklamController@index_add');
    Route::post('reklam/add', 'App\Http\Controllers\Admin\ReklamController@post_add');
    Route::get('reklam/edit/{id}', 'App\Http\Controllers\Admin\ReklamController@edit');
    Route::post('reklam/edit/{id}', 'App\Http\Controllers\Admin\ReklamController@post_edit');
    Route::get('reklam/delete/{id}', 'App\Http\Controllers\Admin\ReklamController@destroy');

    Route::get('games', 'App\Http\Controllers\Admin\GameController@index');
    Route::get('games/add', 'App\Http\Controllers\Admin\GameController@index_add');
    Route::post('games/add', 'App\Http\Controllers\Admin\GameController@post_add');
    Route::get('games/edit/{id}', 'App\Http\Controllers\Admin\GameController@edit');
    Route::post('games/edit/{id}', 'App\Http\Controllers\Admin\GameController@post_edit');
    Route::get('games/delete/{id}', 'App\Http\Controllers\Admin\GameController@destroy');
    Route::post('games/change-active', 'App\Http\Controllers\Admin\GameController@active');

    Route::get('stages', 'App\Http\Controllers\Admin\GameStageController@index');
    Route::get('stages/add', 'App\Http\Controllers\Admin\GameStageController@index_add');
    Route::post('stages/add', 'App\Http\Controllers\Admin\GameStageController@post_add');
    Route::get('stages/edit/{id}', 'App\Http\Controllers\Admin\GameStageController@edit');
    Route::post('stages/edit/{id}', 'App\Http\Controllers\Admin\GameStageController@post_edit');
    Route::get('stages/delete/{id}', 'App\Http\Controllers\Admin\GameStageController@destroy');
    Route::post('stages/change-active', 'App\Http\Controllers\Admin\GameStageController@active');

    Route::get('topscorers', 'App\Http\Controllers\Admin\TopScorerController@index');
    Route::get('topscorers/add', 'App\Http\Controllers\Admin\TopScorerController@index_add');
    Route::post('topscorers/add', 'App\Http\Controllers\Admin\TopScorerController@post_add');
    Route::get('topscorers/edit/{id}', 'App\Http\Controllers\Admin\TopScorerController@edit');
    Route::post('topscorers/edit/{id}', 'App\Http\Controllers\Admin\TopScorerController@post_edit');
    Route::get('topscorers/delete/{id}', 'App\Http\Controllers\Admin\TopScorerController@destroy');


    Route::get('contact', 'App\Http\Controllers\Admin\ContactController@index');
    Route::get('contact/edit', 'App\Http\Controllers\Admin\ContactController@edit');
    Route::post('contact/edit', 'App\Http\Controllers\Admin\ContactController@post_edit');

    Route::get('slider', 'App\Http\Controllers\Admin\SliderController@index');
    Route::get('slider/add', 'App\Http\Controllers\Admin\SliderController@index_add');
    Route::post('slider/add', 'App\Http\Controllers\Admin\SliderController@post_add');
    Route::get('slider/delete/{id}', 'App\Http\Controllers\Admin\SliderController@destroy');
    Route::get('slider/edit/{id}', 'App\Http\Controllers\Admin\SliderController@edit');
    Route::post('slider/edit/{id}', 'App\Http\Controllers\Admin\SliderController@post_edit');

    Route::get('mancard', 'App\Http\Controllers\Admin\MancardController@index');
    Route::get('mancard/edit', 'App\Http\Controllers\Admin\MancardController@edit');
    Route::post('mancard/edit', 'App\Http\Controllers\Admin\MancardController@post_edit');

    Route::get('menclub', 'App\Http\Controllers\Admin\MenclubController@index');
    Route::get('menclub/edit', 'App\Http\Controllers\Admin\MenclubController@edit');
    Route::post('menclub/edit', 'App\Http\Controllers\Admin\MenclubController@post_edit');


});

Route::prefix('admin')->middleware('isLogin')->group(function () {
    Route::get('login', 'App\Http\Controllers\Admin\LoginController@index');
    Route::post('login', 'App\Http\Controllers\Admin\LoginController@post');
   
});




//Front
Route::get('/', "App\Http\Controllers\Front\HomeController@index");
Route::get('/about', "App\Http\Controllers\Front\AboutController@index");
Route::get('/activities', "App\Http\Controllers\Front\ActionController@index");
Route::get('/activity/{id}', "App\Http\Controllers\Front\ActionController@show");
Route::get('/services', "App\Http\Controllers\Front\ServiceController@index");
Route::get('/form', "App\Http\Controllers\Front\FormController@index");
Route::post('/form', "App\Http\Controllers\Front\FormController@post");
Route::get('/partners', "App\Http\Controllers\Front\PartnerController@index");
Route::get('/global', "App\Http\Controllers\Front\GlobalController@index");
Route::post('/man-card/search', "App\Http\Controllers\Front\MancardController@search");
Route::post('/man-card/category', "App\Http\Controllers\Front\MancardController@category");
Route::post('/man-card/brand-scroll', "App\Http\Controllers\Front\MancardController@scroll");
Route::get('/contact', "App\Http\Controllers\Front\ContactController@index");
Route::post('/contact', "App\Http\Controllers\Front\ContactController@post");
Route::get('/men-league', "App\Http\Controllers\Front\MenleagueController@index");
Route::get('/privacy-policy', "App\Http\Controllers\Front\PrivacyController@index");
Route::get('/optimize', "App\Http\Controllers\ConfigController@optimize");
Route::get('/{lang}', 'App\Http\Controllers\Front\HomeController@lang');
