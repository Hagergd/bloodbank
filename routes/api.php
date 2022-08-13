<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\MainController;
use App\Http\Controllers\api\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
https://laravel.com/docs/8.x/mail#generating-markdown-mailables    return $request->user();
});


Route::group(['prefix' =>'v1','namespace' =>'api'],function () {

    Route::post('/register', [App\Http\Controllers\api\AuthController::class, 'register']);
    Route::post('/login', [App\Http\Controllers\api\AuthController::class, 'login']);

    Route::get('/governorates', [App\Http\Controllers\api\MainController::class, 'governorates']);

    Route::get('/cities', [App\Http\Controllers\api\MainController::class, 'cities']);

    Route::get('/categories', [App\Http\Controllers\api\MainController::class, 'categories']);

    Route::get('/blood-types', [App\Http\Controllers\api\MainController::class, 'bloodTypes']);

    Route::get('/settings', [App\Http\Controllers\api\MainController::class, 'settings']);

    Route::post('/reset-password', [App\Http\Controllers\api\AuthController::class, 'resetPassword']);
    Route::post('/new-password', [App\Http\Controllers\api\AuthController::class, 'newPassword']);


    Route::group(['middleware'=>['auth:api']],function(){

        Route::post('/register-token', [App\Http\Controllers\api\AuthController::class, 'registerToken']);

        Route::post('/remove-token', [App\Http\Controllers\api\AuthController::class, 'removeToken']);

        Route::post('/profile', [App\Http\Controllers\api\AuthController::class, 'profile']);

        Route::get('/posts', [App\Http\Controllers\api\MainController::class, 'posts']);

        Route::get('/post', [App\Http\Controllers\api\MainController::class, 'post']);

        Route::get('/list-favourites', [App\Http\Controllers\api\MainController::class, 'listFavourites']);

        Route::post('/toggle-favourites', [App\Http\Controllers\api\MainController::class, 'toggleFavourites']);

        Route::post('/donation-request', [App\Http\Controllers\api\MainController::class, 'donationRequests']);

        Route::get('/donations', [App\Http\Controllers\api\MainController::class, 'donations']);

        Route::get('/donation', [App\Http\Controllers\api\MainController::class, 'donation']);

        Route::post('/contact-us', [App\Http\Controllers\api\MainController::class, 'contactUs']);

        Route::get('/notification', [App\Http\Controllers\api\MainController::class, 'notifications']);

        Route::post('/notification-setting', [App\Http\Controllers\api\MainController::class, 'notificationsSetting']);





        



      
    });







});
