<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {

    $brands=DB::table('brands')->get();
    $about=DB::table('abouts')->first();
    $images=DB::table('multi_pics')->get();
    return view('home',compact('brands','about','images'));
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
    //   $users= User::all();  // read data by Eloquent ORM
        $users=DB::table('users')->get();  // read data by query builder
        return view('Admin.index',compact('users'));
    })->name('dashboard');
});

Route::get('category/all',[CategoryController::class,'allCategories'])->name('all.category');
Route::post('category/add',[CategoryController::class,'addCategory'])->name('store.category');

Route::get('category/edit/{id}',[CategoryController::class,'edit']);
Route::post('category/update{id}',[CategoryController::class,'update'])->name('update.category');

Route::get('softDelete/category/{id}',[CategoryController::class,'softDelete']);

Route::get('restore/category/{id}',[CategoryController::class,'restore']);
Route::get('pDelete/category/{id}',[CategoryController::class,'pDelete']);

/// multi image routes

Route::get('portfolio/all',[BrandController::class,'allImages'])->name('all.image');
Route::post('portfolio/add',[BrandController::class,'storeMultiImage'])->name('store.images');


/// contact page

 Route::get('contact',[ContactController::class,'contact'])->name('contact');
 Route::post('contact/form',[ContactFormController::class,'storeForm'])->name('contactForm');



//////// auth routes

Route::get('user/logout',[AuthController::class,'logout'])->name('user.logout');


Route::get('portfolio/page',[AboutController::class,'portfolio'])->name('profolio.page');


include('admin.php');
