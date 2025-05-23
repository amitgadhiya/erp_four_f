<?php

namespace App\Http\Controllers;

use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartyController extends Controller
{
    function index(Request $request){
        //dd(Auth::user()->user_comp_id);
        $parties = Party::fetch()->get();
        
        return view("pages.party.list" ,compact('parties'));
    }
    function add(Request $request){
        return view("pages.party.add");
    }
    function addPost(Request $request){
        
        $types = $request->input('type'); 
        // Find the user by ID
        $party = new Party();
    
        // Update user details
        $party->party_name = $request->name;
        $party->party_comp_id = Auth::user()->emp_comp_id;
        $party->party_shot_name = $request->shotname;
        $party->party_email = $request->email;
        $party->party_mobile = $request->mobile;
        $party->party_gst = $request->gst;
        $party->party_code = $request->vender_code;
        $party->party_address = $request->address;
        $party->party_status = "ok";
        $party->party_created_by = Auth::user()->emp_id;
        $party->party_updated_by = Auth::user()->emp_id;
        if (in_array('vendor', $types)) {
            $party->party_vender =true;
        }else{
            $party->party_vender = false;
        }
        
        if (in_array('client', $types)) {
            $party->party_client =true;
        }else{
            $party->party_client =false;
        }
    
        
        
        $party->save(); // Save changes
    
        return redirect()->route('party')->with('success', 'Party added successfully!');
    }
    function edit(Request $request,$id){
        $party = Party::fetch()->find($id);

        //dd($user);
        return view("pages.party.edit",compact('party'));
    }
    function editPost(Request $request,$id){
       
        $types = $request->input('type');
        // Find the user by ID
        $party = Party::findOrFail($id);
    
        $party->party_name = $request->name;
        $party->party_shot_name = $request->shotname;
        $party->party_email = $request->email;
        $party->party_mobile = $request->mobile;
        $party->party_gst = $request->gst;
        $party->party_code = $request->vender_code;
        $party->party_address = $request->address;
        $party->party_updated_by = Auth::user()->emp_id;
        if (in_array('vendor', $types)) {
            $party->party_vender =true;
        }else{
            $party->party_vender = false;
        }
        
        if (in_array('client', $types)) {
            $party->party_client =true;
        }else{
            $party->party_client =false;
        }
        
        
        $party->save(); // Save changes
    
        return redirect()->back()->with('success', 'party updated successfully!');
    }
    function delete(Request $request,$id){
        $party = Party::findOrFail($id);
        $party->party_status = "deleted";
        $party->save(); 
        return redirect()->back()->with('success', 'party deleted successfully!');
    }
}
