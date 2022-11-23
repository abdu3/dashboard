<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{

    public function storeForm(Request $request){
        $validated = $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|min:4|email',
            'subject' => 'required|min:4',
            'message' => 'required|min:14',
         ]);


         ContactForm::insert([
            'email'=>$request->email,
            'name'=>$request->name,
            'subject'=>$request->subject,
            'message'=>$request->message,
            'created_at'=>Carbon::now()
     ]);

     return redirect()->Route('contact')->with('success','Your  Message Sent successfully.');


    }

    public function message(){
        return view('Admin.contact.message',['messages'=> ContactForm::all()]);
    }

    public function deleteMessage($id){

        ContactForm::findOrFail($id)->delete();

        return redirect()->back()->with('success','Message delete successfully.');

    }
}
