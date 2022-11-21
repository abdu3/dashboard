<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;


/////////////////// /  admin routes / //////////////////


//  slider routes
Route::get('slider/home',[SliderController::class,'homeSlider'])->name('slider.home') ;
Route::get('slider/create',[SliderController::class,'createSlider'])->name('slider.create') ;
Route::post('slider/store',[SliderController::class,'storeSlider'])->name('slider.store') ;

//  About routes
Route::get('about/home',[AboutController::class,'homeAbout'])->name('about.home') ;
Route::get('about/create',[AboutController::class,'createAbout'])->name('about.create') ;
Route::post('about/store',[AboutController::class,'storeAbout'])->name('about.store') ;
Route::get('about/edit/{id}',[AboutController::class,'editAbout'])->name('about.edit') ;
Route::post('about/update/{id}',[AboutController::class,'updateAbout'])->name('about.update') ;
Route::get('about/delete/{id}',[AboutController::class,'deleteAbout'])->name('about.delete') ;
