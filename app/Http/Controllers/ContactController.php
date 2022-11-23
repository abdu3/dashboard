<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{

    public function HomeContact(){
        $contacts=Contact::all();

        return view('Admin.contact.index',compact('contacts'));
    }

    public function createContact(){
        return view('Admin.Contact.create');
    }

    public function storeContact(Request $request){
        $validated = $request->validate([
            'email' => 'required|min:4|email',
            'phone' => 'required|min:9|numeric',
            'address' => 'required|min:8',
         ]);


     Contact::insert([
         'email'=>$request->email,
         'phone'=>$request->phone,
         'address'=>$request->address,
         'created_at'=>Carbon::now()
     ]);


     return redirect()->Route('contact.all')->with('success','Contact  Information inserted successfully.');
    }

   public function editContact($id){

    $contact=Contact::findOrFail($id);
    return view('Admin.contact.edit',compact('contact'));

   }

   public function updateContact(Request $request , $id){

    $validated = $request->validate([
        'email' => 'required|min:4|email',
        'phone' => 'required|min:9|numeric',
        'address' => 'required|min:8',
     ]);


 Contact::findOrFail($id)->update([
     'email'=>$request->email,
     'phone'=>$request->phone,
     'address'=>$request->address,
     'created_at'=>Carbon::now()
    ]);
    return redirect()->Route('contact.all')->with('success','Contact  Information Updated successfully.');


   }



    public function deleteContact($id){

    $contact=Contact::findOrFail($id);

    $contact->delete();

    return redirect()->back()->with('success','contact item delete successfully.');

    }


    public function contact(){
        $contact=DB::table('contacts')->first();

        return view('pages.contact',compact('contact'));

    }


}
