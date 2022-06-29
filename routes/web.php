<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/logout',[DashboardController::class, 'Logout']);
Route::get('/delete_account',[DashboardController::class, 'deleteAccount']);

require __DIR__.'/auth.php';


Route::get('auth/facebook', [UserController::class, 'facebookRedirect']);
Route::get('/callback', [UserController::class, 'loginWithFacebook']);

Route::get('/facebook_messenger_api', [UserController::class, 'verify_token']);

Route::get('/privacy', function () {
 
    "privacy";
});

Route::get('/terms', function () {
   'terms';
});

Route::get('/pages', [PageController::class, 'index']);
Route::post('disable', [PageController::class, 'disable'])->name('disable_bot');
Route::post('enable', [PageController::class, 'enable'])->name('enable_bot');

Route::get('/get_posts/{page_id}/{token}', [PageController::class, 'getPosts']);

Route::get('/test', [PageController::class, 'name']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
