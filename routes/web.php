<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('auth/facebook', [UserController::class, 'facebookRedirect']);
Route::get('/callback', [UserController::class, 'loginWithFacebook']);

Route::post('/facebook_messenger_api', [UserController::class, 'verify_token']);

Route::get('/privacy', function () {
 
    "privacy";
});

Route::get('/terms', function () {
   'terms';
});

Route::get('/pages', [PageController::class, 'index']);
Route::post('disable', [PageController::class, 'disable'])->name('disable_bot');
Route::get('enable/{page_id}/{token}', [PageController::class, 'enable']);

Route::get('/get_posts/{page_id}/{token}', [PageController::class, 'getPosts']);

Route::get('/test', [PageController::class, 'name']);