<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\Blog\PostController;
use App\Http\Controllers\Api\Blog\CommentController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\SlideController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\Portfolio\PortfolioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group( [ 'prefix' => '','as'=>'api.'], function(){

    Route::resource('abouts', AboutController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('slides', SlideController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);

});


