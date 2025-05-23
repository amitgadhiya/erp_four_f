<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    function index(Request $request){
        //dd(Auth::user()->user_comp_id);
        $clients = Client::fetch()->get();
        
        return view("pages.client.list" ,compact('clients'));
    }
    function add(Request $request){
        return view("pages.client.add");
    }
    function addPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        
        // Find the user by ID
        $client = new Client();
    
        // Update user details
        $client->client_name = $request->name;
        $client->client_comp_id = Auth::user()->emp_comp_id;
        $client->client_shot_name = $request->shotname;
        $client->client_email = $request->email;
        $client->client_mobile = $request->mobile;
        $client->client_gst_no = $request->gst;
        $client->client_vender_code = $request->vender_code;
        $client->client_address = $request->address;
        $client->client_contact_person = $request->contact_person;
        $client->client_status = "ok";
        $client->client_created_by = Auth::user()->emp_id;
        $client->client_updated_by = Auth::user()->emp_id;
    
        
        
        $client->save(); // Save changes
    
        return redirect()->route('client')->with('success', 'Client added successfully!');
    }
    function edit(Request $request,$id){
        $client = Client::fetch()->find($id);

        //dd($user);
        return view("pages.client.edit",compact('client'));
    }
    function editPost(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        
        // Find the user by ID
        $client = Client::findOrFail($id);
    
        // Update user details
        $client->client_name = $request->name;
        $client->client_shot_name = $request->shotname;
        $client->client_email = $request->email;
        $client->client_mobile = $request->mobile;
        $client->client_gst_no = $request->gst;
        $client->client_vender_code = $request->vender_code;
        $client->client_address = $request->address;
        $client->client_contact_person = $request->contact_person;
        $client->client_updated_by = Auth::user()->emp_id;
        
        
        $client->save(); // Save changes
    
        return redirect()->back()->with('success', 'Client updated successfully!');
    }
    function delete(Request $request,$id){
        $client = Client::findOrFail($id);
        $client->client_status = "deleted";
        $client->save(); 
        return redirect()->back()->with('success', 'Client deleted successfully!');
    }
}
