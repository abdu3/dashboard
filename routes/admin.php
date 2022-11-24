<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/////////////////// /  admin routes / //////////////////


//  slider routes
Route::get('slider/home',[SliderController::class,'homeSlider'])->name('slider.home') ;
Route::get('slider/create',[SliderController::class,'createSlider'])->name('slider.create') ;
Route::post('slider/store',[SliderController::class,'storeSlider'])->name('slider.store') ;
Route::get('slider/edit/{id}',[SliderController::class,'editSlider'])->name('about.edit') ;
Route::post('slider/update/{id}',[SliderController::class,'updateSlider'])->name('slider.update') ;
Route::get('slider/delete/{id}',[SliderController::class,'deleteSlider'])->name('slider.delete') ;

//  About routes
Route::get('about/home',[AboutController::class,'homeAbout'])->name('about.home') ;
Route::get('about/create',[AboutController::class,'createAbout'])->name('about.create') ;
Route::post('about/store',[AboutController::class,'storeAbout'])->name('about.store') ;
Route::get('about/edit/{id}',[AboutController::class,'editAbout'])->name('about.edit') ;
Route::post('about/update/{id}',[AboutController::class,'updateAbout'])->name('about.update') ;
Route::get('about/delete/{id}',[AboutController::class,'deleteAbout'])->name('about.delete') ;


// Brand Routes
Route::get('brand/all',[BrandController::class,'allBrand'])->name('all.brand');
Route::post('brand/add',[BrandController::class,'store'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class,'edit']);
Route::post('brand/update{id}',[BrandController::class,'update'])->name('update.brand');
Route::get('/brand/delete/{id}',[BrandController::class,'delete']);

// contact Route

Route::get('contact/all',[ContactController::class,'HomeContact'])->name('contact.all');
Route::get('contact/create',[ContactController::class,'createContact'])->name('contact.create');
Route::post('contact/store',[ContactController::class,'storeContact'])->name('contact.store');
Route::get('contact/edit/{id}',[ContactController::class,'editContact']);
Route::post('contact/update{id}',[ContactController::class,'updateContact'])->name('contact.update');
Route::get('contact/delete/{id}',[ContactController::class,'deleteContact']);

// message route
Route::get('contact/message',[ContactFormController::class,'message'])->name('message');
Route::get('message/delete/{id}',[ContactFormController::class,'deleteMessage']);


// user route
Route::get('user/changepassword',[UserController::class,'profile'])->name('profile');
Route::post('user/updatepassword',[UserController::class,'UpdatePassword'])->name('update.password');
Route::post('user/updateprofile',[UserController::class,'updateProfile'])->name('update.profile');
