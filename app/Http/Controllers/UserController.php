<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile(){

        if(Auth::user()){
            $user = User::find(Auth::user()->id);
            if($user){
                return view('Admin.User.profile',compact('user'));
            }
        }

    }

    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldPass' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldPass,$hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success','Password Is Chanage Successfuly');

        }else{
            return redirect()->back()->with('error','Current Password IS Invalid');
        }

    }

    public function updateProfile(Request $request){

        // profile-photos
        //        $attributes["profile_photo_path"]=request()->file('thumbnail')->store('thumbnails');
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'profile_photo_path' => 'required|mimes:jpg,jpeg,png'
        ]);

        // $hasPhoto = Auth::user()->profile_photo_path;

        $validateData["profile_photo_path"]=request()->file('profile_photo_path')->store('profile-photos');

        // dd(  $validateData["profile_photo_path"]);

        // $user=new User();
        $user = User::find(Auth::id());
        // dd($user);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->profile_photo_path=$validateData["profile_photo_path"];

        $user->save();


        return redirect()->back()->with('success','updated profile information');





    }

}
