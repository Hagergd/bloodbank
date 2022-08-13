<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GovernoratesController;
use App\Http\Controllers\CitiesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DonationsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Front\MainController;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|6
*/





Route::get('/admin', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' =>'Front'],function () {

     Route::get('/', [App\Http\Controllers\Front\MainController::class,'home'])->name('index');
     Route::get('/all-requests', [App\Http\Controllers\Front\MainController::class,'allRequests'])->name('all-requests');

     Route::get('/inside-request/{id}', [App\Http\Controllers\Front\MainController::class,'insideRequest'])->name('inside-request');

     Route::get('/who-are', [App\Http\Controllers\Front\MainController::class,'whoAre'])->name('who-are');

     Route::get('/about-app', [App\Http\Controllers\Front\MainController::class,'aboutApp'])->name('about-app');

     Route::post('/toggle-favourite', [App\Http\Controllers\Front\MainController::class,'toggleFavourite'])->name('toggle-favourte');

     Route::get('/article-details', [App\Http\Controllers\Front\MainController::class,'articleDetails'])->name('article-details');

     
     Route::get('/client-register', [App\Http\Controllers\Front\AuthController::class,'clientRegister'])->name('client-register');

     Route::get('/client-login', [App\Http\Controllers\Front\AuthController::class,'clientLogin'])->name('client-login');


     Route::get('/client-contact-us', [App\Http\Controllers\Front\AuthController::class,'clientContactUs'])->name('client-contact-us');

     Route::post('/message', [App\Http\Controllers\Front\MainController::class,'messageStore'])->name('message');

     Route::get('/post/{id}', [App\Http\Controllers\Front\MainController::class,'postShow'])->name('front-post');


     Route::post('/search-donation', [App\Http\Controllers\Front\MainController::class,'search'])->name('search-donation');


});

Route::resource('governorates', GovernoratesController::class);
Route::resource('cities', CitiesController::class);
Route::resource('categories',CategoriesController::class);
Route::resource('posts',PostsController::class);
Route::resource('clients',ClientsController::class);
Route::resource('contacts',ContactsController::class);
Route::resource('donations',DonationsController::class);
Route::resource('settings',SettingsController::class);
Route::resource('users',UserController::class);
Route::resource('admin',AdminController::class);




Route::get('/edit-user/{id}', [App\Http\Controllers\UserController::class,'edit'])->name('edit-user');
Route::post('/update-user/{id}', [App\Http\Controllers\UserController::class,'update'])->name('update-user');

Route::get('/edit-password/{id}', [App\Http\Controllers\AdminController::class,'edit'])->name('edit-password');
Route::post('/update-password/{id}', [App\Http\Controllers\AdminController::class,'update'])->name('update-password');

Route::get('/donation-details/{id}', [App\Http\Controllers\DonationsController::class,'edit'])->name('donation-details');
Route::get('/edit/{id}', [App\Http\Controllers\PostsController::class,'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\PostsController::class,'update'])->name('update');
Route::post('/update-settings/{id}', [App\Http\Controllers\SettingsController::class,'update'])->name('update-settings');

Route::post('/update-settings/{id}', [App\Http\Controllers\AuthController::class,'update'])->name('update-settings');



Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    
});
