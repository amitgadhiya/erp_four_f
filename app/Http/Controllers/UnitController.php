<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    function index(Request $request){
        $units = Unit::fetch()->get();
        return view('pages.unit.list',compact(['units']));
    }
    function add(Request $request){
        return view('pages.unit.add');
    }
    function addPost(Request $request){
        $unit = new Unit();
        $unit->unit_comp_id = Auth::user()->company->comp_id;
        $unit->unit_name = $request->name;
        $unit->unit_created_by = Auth::user()->emp_id;
        $unit->unit_updated_by = Auth::user()->emp_id;
        $unit->unit_status = "ok";
        $unit->save();
        return back()->with("success","Saved Successfully");
    }
    function edit(Request $request,$id){
        $unit = Unit::fetch()->find($id);
        return view('pages.unit.edit',compact(['unit']));
    }
    function editPost(Request $request,$id){
        $unit = Unit::find($id);
        $unit->unit_name = $request->name;
        $unit->unit_updated_by = Auth::user()->emp_id;
        $unit->save();
        return back()->with("success","Saved Successfully");
    }
    function delete(Request $request){
        $unit = Unit::find($request->id);
        $unit->unit_updated_by = Auth::user()->emp_id;
        $unit->unit_status = "deleted";
        $unit->save();
        return back()->with("success","Deleted Successfully");
    }
}
