<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function HomeAbout(){
        $abouts=About::latest()->get();
        return view('Admin.About.index',compact('abouts'));

    }
    public function createAbout(){

        return view('Admin.About.create');
    }


   public function storeAbout(Request $request){


    $validated = $request->validate([
        'title' => 'required|min:4',
        'short_desc' => 'required|min:20',
        'long_desc' => 'required|min:20',
     ]);


 About::insert([
     'title'=>$request->title,
     'short_desc'=>$request->short_desc,
     'long_desc'=>$request->long_desc,
     'created_at'=>Carbon::now()
 ]);


 return redirect()->Route('about.home')->with('success','About Us details inserted successfully.');

}

 public function editAbout($id){
    $about=About::findOrFail($id);
    return view('Admin.About.edit',compact('about'));
 }

    public function updateAbout(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|min:4',
            'short_desc' => 'required|min:20',
            'long_desc' => 'required|min:20',
         ]);

        About::findOrFail($id)->update([
            'title'=>$request->title,
            'short_desc'=>$request->short_desc,
            'long_desc'=>$request->long_desc,
            'updated_at'=>Carbon::now()
         ]);




         return redirect()->back()->with('success','About items updated successfully.');

    }

 public function deleteAbout($id){

    $about=About::findOrFail($id);

    $about->delete();

    return redirect()->back()->with('success','About item delete successfully.');

 }



}
