<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
   public function  homeSlider(){
    $sliders=Slider::latest()->paginate(5);
    return view('Admin.slider.index',compact('sliders'));
   }

   public function createSlider(){
    return view('Admin.slider.create');
   }

   public function storeSlider(Request $request){


       $validated = $request->validate([
           'title' => 'required|min:4',
           'description' => 'required|min:20',
           'image' => 'required|mimes:jpg,jpeg,png',
        ]);

    $image=$request->file('image');

    $img_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    Image::make($image)->resize(1920,1088)->save('image/sliders/'.$img_gen);
    // Image::make($brand_image)->resize(300,200)->colorize(-50, 10, 20)->save('image/brand/'.$img_gen);

    $last_img='image/sliders/'.$img_gen;
    Slider::insert([
        'title'=>$request->title,
        'description'=>$request->description,
        'image'=>$last_img,
        'created_at'=>Carbon::now()
    ]);


    return redirect()->route('slider.home')->with('success','Slider details inserted successfully.');


   }
}
