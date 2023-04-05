<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

// use App\Http\Controllers\ContactController;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::orderby('id','Asc')->paginate(4);

        return view('list',['contacts'=> $contacts]);
        
        
    }

    // public function create()
    // {
    //     return view('contact');
    // }

    public function create()
    {
        return view('contact');
    }

    public function store(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' =>'required'
        ]);
        if($validator->passes() )
        {
            //save data here
            $contact = new Contact();
            $contact->name = $req->name;
            $contact->email = $req->email;
            $contact->password =md5($req->password);
            $contact->description = $req->description;

            $contact->save();

            $req->Session()->flash('success', 'Contact Successfully Added.');

            return redirect()->route('index');
        }
        else 
        {
            //return with errors
            return redirect()->route('create')->witherrors($validator)->withInput();
        }


    
        // echo "<pre>";
        // print_r($req->input());

        // $contact = new Contact;
        // $contact->name = $req->['name'];
        // $contact->email = $req->['email'];
        // $contact->password = $req->['password'];

        // echo $contact->save();
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);

        return view('edit', ['contact' => $contact]);
    }

    public function update($id, Request $req)
    {
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' =>'required'
        ]);
        if($validator->passes() )
        {
            //save data here
            $contact = Contact::find($id);
            $contact->name = $req->name;
            $contact->email = $req->email;
            $contact->password = $req->password;
            $contact->description = $req->description;

            $contact->save();

            // $req->Session()->flash('success', 'Contact Successfully Updated.');

            return redirect()->route('index');
        }
        else 
        {
            //return with errors
            return redirect()->route('edit', $id)->withErrors($validator)->withInput();
        }

    }



}
