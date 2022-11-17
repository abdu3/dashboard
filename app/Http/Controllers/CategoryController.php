<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function allCategories (){
        // read date by Eloquent ORM
        // $categories=Category::OrderBy('created_at','desc')->get();
        $categories=Category::latest()->paginate(5);
        $trashCat=Category::onlyTrashed()->latest()->paginate(3);

        // join relation with query builder

        // $categories=DB::table('categories')
        //         ->join('users','categories.user_id','users.id')
        //         ->select('categories.*','users.name')
        //         ->latest()->paginate(5);

        // read data by query builder
        // $categories=DB::table('categories')->latest()->paginate(5);

        return view('Admin.Category.index',compact('categories','trashCat'));
    }

    public function addCategory(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
        [
            //  Custom message
            'category_name.required' => 'Please Inter Category Name',
        ]
    );

    // Category::insert([
    //     'category_name'=>$request->category_name,
    //     'user_id'=> Auth::user()->id,
    //     "created_at"=>Carbon::now()
    // ]);

    $category= new Category();
    $category->category_name=$request->category_name;
    $category->user_id=Auth::user()->id;
    $category->save();

    // insert data with query builder

    // $data=array();
    // $data['category_name']=$request->category_name;
    // $data['user_id']=Auth::user()->id;
    // DB::table('categories')->insert([$data]);


    return redirect()->back()->with('success','Your details has been successfully submitted.');

    }

    public function edit($id){
        $categories=Category::find($id);
        return view('Admin.Category.edit',compact('categories'));
    }

    public function update(Request $request,$id){
        $update=Category::find($id)->Update([
            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id
        ]);
        return redirect()->route('all.category')->with('success','Category successfully Updated.');
    }

    public function softDelete($id){
        $softDelete=Category::find($id)->delete();
        return redirect()->back()->with('success','Category successfully Delete.');
    }
    public function restore($id){
        Category::onlyTrashed()->find($id)->restore();
        return redirect()->back()->with('success','Category successfully Restored.');
    }
    public function pDelete($id){
        Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('success','Category successfully permanently Delete.');
    }
}
