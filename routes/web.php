<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
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
    return view('home',compact('brands'));
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

Route::get('multiImage/all',[BrandController::class,'allImages'])->name('all.image');
Route::post('multiImage/add',[BrandController::class,'storeMultiImage'])->name('store.images');



// Brand Routes
Route::get('brand/all',[BrandController::class,'allBrand'])->name('all.brand');
Route::post('brand/add',[BrandController::class,'store'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'edit']);
Route::post('brand/update{id}',[BrandController::class,'update'])->name('update.brand');
Route::get('/brand/delete/{id}',[BrandController::class,'delete']);

//////// auth routes

Route::get('user/logout',[AuthController::class,'logout'])->name('user.logout');


include('admin.php');
