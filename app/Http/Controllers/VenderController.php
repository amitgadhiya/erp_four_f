<?php

namespace App\Http\Controllers;

use App\Models\Vender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VenderController extends Controller
{
    function index(Request $request){
        //dd(Auth::user()->user_comp_id);
        $venders = Vender::fetch()->get();
        return view("pages.vender.list" ,compact('venders'));
    }
    function add(Request $request){
        return view("pages.vender.add");
    }
    function addPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        
        // Find the user by ID
        $vender = new Vender();
    
        // Update user details
        $vender->vender_name = $request->name;
        $vender->vender_comp_id = Auth::user()->emp_comp_id;
        $vender->vender_shot_name = $request->shotname;
        $vender->vender_email = $request->email;
        $vender->vender_mobile = $request->mobile;
        $vender->vender_gst_no = $request->gst;
        $vender->vender_code = $request->vender_code;
        $vender->vender_address = $request->address;
        $vender->vender_contact_person = $request->contact_person;
        $vender->vender_status = "ok";
        $vender->vender_created_by = Auth::user()->emp_id;
        $vender->vender_updated_by = Auth::user()->emp_id;
    
        
        
        $vender->save(); // Save changes
    
        return redirect()->route('vender')->with('success', 'Vender added successfully!');
    }
    function edit(Request $request,$id){
        $vender = Vender::fetch()->find($id);

        //dd($user);
        return view("pages.vender.edit",compact('vender'));
    }
    function editPost(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);
        
        // Find the user by ID
        $vender = Vender::findOrFail($id);
    
        // Update user details
        $vender->vender_name = $request->name;
        $vender->vender_shot_name = $request->shotname;
        $vender->vender_email = $request->email;
        $vender->vender_mobile = $request->mobile;
        $vender->vender_gst_no = $request->gst;
        $vender->vender_code = $request->vender_code;
        $vender->vender_address = $request->address;
        $vender->vender_contact_person = $request->contact_person;
        $vender->vender_updated_by = Auth::user()->emp_id;
    
        
        
        $vender->save(); // Save changes
    
        return redirect()->back()->with('success', 'Vender updated successfully!');
    }
    function delete(Request $request,$id){
        $vender = Vender::findOrFail($id);
        $vender->vender_status = "deleted";
        $vender->vender_updated_by = Auth::user()->emp_id;
        $vender->save(); 
        return redirect()->back()->with('success', 'Vender deleted successfully!');
    }
}
