<?php

use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;


/////////////////// /  admin routes / //////////////////


//  slider routes
Route::get('home/slider',[SliderController::class,'homeSlider'])->name('slider.home') ;
Route::get('create/slider',[SliderController::class,'createSlider'])->name('slider.create') ;
Route::post('store/slider',[SliderController::class,'storeSlider'])->name('slider.store') ;
