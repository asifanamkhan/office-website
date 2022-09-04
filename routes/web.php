<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\Blog\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TechController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\Blog\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;

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

//Route::get('/', function () {
//    return view('home');
//});

//Frontend routes
Route::group( [ 'prefix' => '','as'=>''], function()
{

    Route::get('/', [HomeController::class,'index'])->name('home');


    //Resource route
    Route::resource('abouts', \App\Http\Controllers\Frontend\AboutController::class);
    Route::resource('contacts', \App\Http\Controllers\Frontend\ContactController::class);
    Route::resource('services', \App\Http\Controllers\Frontend\ServiceController::class);
    Route::resource('portfolios', \App\Http\Controllers\Frontend\PortfolioController::class);
    //Route::resource('posts', PostController::class);
    //Route::resource('comments', CommentController::class);
    Route::resource('newsletters', \App\Http\Controllers\Frontend\NewsletterController::class);
    Route::resource('testimonials', \App\Http\Controllers\Frontend\TestimonialController::class);
    Route::resource('teams', \App\Http\Controllers\Frontend\TeamController::class);




    Route::get('privacy-policy', [\App\Http\Controllers\Frontend\PrivacyPolicyController::class,'privacyPolicy'])->name('privacy-policy');
    Route::get('terms', [\App\Http\Controllers\Frontend\PrivacyPolicyController::class,'terms'])->name('terms');
    //Route::resource('techs', TechController::class);

});


//Dashboard routes

Route::group( [ 'prefix' => 'admin','as'=>'admin.'], function()
{

    Route::get('/', [DashboardController::class,'index'])->name('dashboard');

    Route::resource('abouts', AboutController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('slides', SlideController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('tags', TagController::class);
    Route::resource('posts', PostController::class);
    Route::resource('comments', CommentController::class);
    Route::resource('newsletters', NewsletterController::class);
    Route::resource('testimonials', TestimonialController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('teams', TeamController::class);
    Route::resource('settings', SettingsController::class);
    Route::resource('techs', TechController::class);

});





