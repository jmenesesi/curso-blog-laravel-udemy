<?php

use Illuminate\Http\Request;
use App\User;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'Auth\AuthController@login');
    Route::post('logout', 'Auth\AuthController@logout');
    Route::post('refresh', 'Auth\AuthController@refresh');
    Route::post('me', 'Auth\AuthController@me');


});
Route::group(['middleware' => 'auth:api', 'prefix' => 'admin'], function () {
	Route::get('posts', 'Api\Admin\PostsController@index');
});

Route::get('posts', 'PagesController@home');
Route::get('posts/{post}', 'PostsController@show');
Route::get('categories/{category}', 'CategoriesController@show');
Route::get('tags/{tag}', 'TagsController@show');
Route::get('archive', 'PagesController@archive');

Route::post('messages', function(){
    return response()->json([
        'status' => 'OK'
    ]);
});

