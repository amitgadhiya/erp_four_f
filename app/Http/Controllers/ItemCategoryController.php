<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemCategoryController extends Controller
{
    function index(Request $request){
        $ics = ItemCategory::fetch()->get();
        
        return view('pages.item_catg.list',compact('ics'));
    }
    function add(Request $request){
        return view('pages.item_catg.add');
    }
    function addPost(Request $request){
        $ic = new ItemCategory();
        $ic->ic_comp_id = Auth::user()->company->comp_id;
        $ic->ic_name = $request->ic_name;
        $ic->ic_shot = $request->ic_shot;
        $ic->ic_created_by = Auth::user()->emp_id;
        $ic->ic_updated_by = Auth::user()->emp_id;
        $ic->ic_status = "ok";
        $ic->save();
        return back()->with("success","Saved Successfully");
    }
    function edit(Request $request,$id){
        $ic = ItemCategory::fetch()->find($id);
        return view('pages.item_catg.edit',compact(['ic']));
    }
    function editPost(Request $request,$id){
        $ic = ItemCategory::find($id);
        $ic->ic_name = $request->ic_name;
        $ic->ic_shot = $request->ic_shot;
        $ic->ic_updated_by = Auth::user()->emp_id;
        $ic->save();
        return back()->with("success","Saved Successfully");
    }
    function delete(Request $request){
        $ic = ItemCategory::find($request->id);
        $ic->ic_updated_by = Auth::user()->emp_id;
        $ic->ic_status = "deleted";
        $ic->save();
        return back()->with("success","Deleted Successfully");
    }
}
