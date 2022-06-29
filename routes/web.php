<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
<<<<<<< HEAD
=======
use App\Http\Controllers\DashboardController;
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

Route::get('/', function () {
    return view('welcome');
});


<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
=======
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/logout',[DashboardController::class, 'Logout']);
Route::get('/delete_account',[DashboardController::class, 'deleteAccount']);
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

require __DIR__.'/auth.php';


Route::get('auth/facebook', [UserController::class, 'facebookRedirect']);
Route::get('/callback', [UserController::class, 'loginWithFacebook']);

<<<<<<< HEAD
Route::post('/facebook_messenger_api', [UserController::class, 'verify_token']);
=======
Route::get('/facebook_messenger_api', [UserController::class, 'verify_token']);
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b

Route::get('/privacy', function () {
 
    "privacy";
});

Route::get('/terms', function () {
   'terms';
});

Route::get('/pages', [PageController::class, 'index']);
Route::post('disable', [PageController::class, 'disable'])->name('disable_bot');
<<<<<<< HEAD
Route::get('enable/{page_id}/{token}', [PageController::class, 'enable']);

Route::get('/get_posts/{page_id}/{token}', [PageController::class, 'getPosts']);

Route::get('/test', [PageController::class, 'name']);
=======
Route::post('enable', [PageController::class, 'enable'])->name('enable_bot');
Route::post('activate_reply', [PageController::class, 'getPosts'])->name('activate_reply');

Route::post('/index_form_reply', [PageController::class, 'indexFormReply']);
Route::post('/post_form_reply', [PageController::class, 'postFormReply']);
>>>>>>> 02b5ef90dbc5d6998f22015d5ae8bc0d4ffc088b
