<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index(Request $request)
    {
        $flag=false;
        $order="asc";
        $users=Contact::all();
        $result=$request->input("sort");

        if($result==='name')
        {
            $order='asc';
            
        }
        else if($result==='created_at')
        {
            $order='desc';
        }

        if($check=$request->input('search'))
        {
            $flag=true;
            if($result){
            $users=Contact::where('name','like',"%{$check}%")
                        ->orWhere('email','like',"%{$check}%")
                        ->orderBy($result,$order)
                        ->get();                      
            }
            else
            {
                $users=Contact::where('name','like',"%{$check}%")
                        ->orWhere('email','like',"%{$check}%")
                        ->get();  
            }
        }
        
        else
        {
            if($result){
            $users=Contact::orderBy($result,$order)
                        ->get(); 
            }               
        }

    
            
        $heading = $check ? 'Search Contact List' : 'All Contacts List';

        return view("index",compact('users','flag','heading'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email',
            'phone'=> 'nullable|string',
            'address' => 'nullable|string'
        ]);

        $contact=new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->address = $request->address;
        $contact->save();


        return redirect()->route('contacts.create')->with(['success'=>'Add Contact Successfully']);
    }

    public function show($id)
    {
        $user=Contact::findOrFail($id);    
        return view("show",compact('user'));
            
    }

    public function edit($id)
    {
        $user=Contact::find($id);

        return view('edit',compact('user'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:contacts,email,' .$id,
            'phone'=> 'nullable|string',
            'address' => 'nullable|string'
        ]);

        Contact::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('contacts.edit',['id' => $id])->with(['success'=>'Update Contact Successfully']);
        
    }

    
    public function destroy($id)
        {
            $user=Contact::findOrFail($id);
            $user->delete();
            return redirect()->route("contacts.index");
        }
}
