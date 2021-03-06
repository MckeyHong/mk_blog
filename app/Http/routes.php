<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['domain'=> env('WEB_DOMAIN')], function () {
    Route::get('/', 'ArticleController@index');


    Route::resource('article', 'ArticleController');
    Route::resource('comment', 'CommentController');
    Route::resource('category', 'CategoryController');
    Route::resource('about', 'AboutController');


    Route::controllers([
        'backend/auth' => 'backend\AuthController',
        'backend/password' => 'backend\PasswordController',
        'search'=>'SearchController',
    ]);
});

Route::group(['prefix'=>'backend','middleware'=>'auth', 'domain'=> env('WEB_DOMAIN')], function () {
    Route::any('/','backend\HomeController@index');
    Route::resource('home', 'backend\HomeController');
    Route::resource('cate','backend\CateController');
    Route::resource('content','backend\ContentController');
    Route::resource('article','backend\ArticleController');
    Route::resource('tags','backend\TagsController');
    Route::resource('user','backend\UserController');
    Route::resource('comment','backend\CommentController');
    Route::resource('nav','backend\NavigationController');
    Route::resource('links','backend\LinksController');
    Route::controllers([
        'system'=>'backend\SystemController',
        'upload'=>'backend\UploadFileController'
    ]);

});