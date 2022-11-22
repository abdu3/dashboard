<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\MultiPic;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Image;
class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }


    public function allBrand(){

        $brands=Brand::latest()->paginate(5);

        return view('Admin.Brand.index',compact('brands'));
    }

    /// Store function to store brand name and image in DB

   public  function store(Request $request)
   {
    $validated = $request->validate([
        'brand_name' => 'required|unique:brands|min:4',
        'brand_image' => 'required|unique:brands|mimes:jpg,jpeg,png',
    ],
    [
        //  Custom message
        'brand_name.required' => 'Please Inter Category Name',
    ]);

            // // get file from request
            // $brand_image=$request->file('brand_image');
            // // generate uniqid name
            // $img_gen=hexdec(uniqid());
            // // get image extension
            // $img_ext=strtolower($brand_image->getClientOriginalExtension());
            // // name for image by merge the uniqid name and image extension
            // $image_name=$img_gen.'.'. $img_ext;
            // // path for store image in.
            // $up_location='image/brand/';
            // // merge image path and name to be store in DB
            // $last_img=$up_location.$image_name;
            // // Move image file to location with it's generated name.
            // $brand_image->move($up_location,$image_name);

            // using image-Intervention package

            $brand_image=$request->file('brand_image');
            $img_gen=hexdec(uniqid()).'.'.$brand_image->getClientOriginalExtension();
            Image::make($brand_image)->resize(300,200)->save('image/brand/'.$img_gen);
            // Image::make($brand_image)->resize(300,200)->colorize(-50, 10, 20)->save('image/brand/'.$img_gen);

            $last_img='image/brand/'.$img_gen;
            Brand::insert([
                'brand_name'=>$request->brand_name,
                'brand_image'=>$last_img,
                'created_at'=>Carbon::now()
            ]);


    return redirect()->back()->with('success','Brand details inserted successfully.');

   }

  public  function edit($id){

    $brands=Brand::find($id);
    return view('Admin.Brand.edit',compact('brands'));
  }

  // method to update brand

  public function update(Request $request , $id){

    $validated = $request->validate([
        'brand_name' => 'required|min:4',
        'brand_image' => 'mimes:jpg,jpeg,png',
    ],
    [
        //  Custom message
        'brand_name.required' => 'Please Inter Category Name',
    ]);

    // get file from request
    $brand_image=$request->file('brand_image');

    if($brand_image){
        // generate uniqid name
        $img_gen=hexdec(uniqid());
        // get image extension
        $img_ext=strtolower($brand_image->getClientOriginalExtension());
        // name for image by merge the uniqid name and image extension
        $image_name=$img_gen.'.'. $img_ext;
        // path for store image in.
        $up_location='image/brand/';
        // merge image path and name to be store in DB
        $last_img=$up_location.$image_name;
        // Move image file to location with it's generated name.
        $brand_image->move($up_location,$image_name);

        $old_img=$request->old_image;
        unlink($old_img);

        Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'brand_image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success','Brand details inserted successfully.');
    }
    else{
        Brand::find($id)->update([
            'brand_name'=>$request->brand_name,
            'created_at'=>Carbon::now()
        ]);
        return redirect()->back()->with('success','Brand details inserted successfully.');
    }


  }

  public function delete($id){

    $brands=Brand::find($id);
    $brand_image=$brands->brand_image;

    try {
        unlink($brand_image);
    } catch (\Throwable $th) {
        //throw $th;
    }

    $brands->delete();

        return redirect()->back()->with('success','Brand item delete successfully.');

  }
  public function apiTest($id){


  }

  /// multi image

  public function allImages(){

    $images=MultiPic::latest()->get();

    return view('Admin.MultiImage.index',compact('images'));
}

 public function storeMultiImage(Request $request){
    $validated = $request->validate([
        'multi_images' => 'required',
        'multi_images.*' => 'image|mimes:jpg,jpeg,png',
    ],
       [ 'multi_images.*.mimes' => 'only jpg, jpeg , png allowed ']
);


if($request->hasFile('multi_images')){

    foreach($request->multi_images as $images){
        $img_gen=hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
        Image::make($images)->resize(579,861)->save('image/multi/'.$img_gen);

        $last_img='image/multi/'.$img_gen;
        MultiPic::insert([
            'image'=>$last_img,
            'created_at'=>Carbon::now()
        ]);
    } // end foreach

}
    return redirect()->back()->with('success','Multi Images are inserted successfully.');
 }

}
