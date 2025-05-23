<?php

namespace App\Http\Controllers;

use App\Models\WorkCatg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkCatgController extends Controller
{
    function index(Request $request){
        $wcs = WorkCatg::fetch()->get();
        return view('pages.work-catg.list',compact('wcs'));
    }
    function add(Request $request){
        return view('pages.work-catg.add');
    }
    function addPost(Request $request){
        $wc = new WorkCatg();
        $wc->wc_name = $request->wc_name;
        $wc->wc_type = $request->wc_type;
        $wc->wc_comp_id = Auth::user()->emp_comp_id;
        $wc->wc_status = "ok";
        $wc->save();
        return redirect()->route('workCatg')->with('success','added successfully');
    }
    function edit(Request $request,$id){
        $wc = WorkCatg::find($id);
        return view('pages.work-catg.add',compact('wc'));
    }
    function editPost(Request $request, $id){
        $wc = WorkCatg::find($id);
        $wc->wc_name = $request->wc_name;
        $wc->wc_type = $request->wc_type;
        $wc->save();
        return redirect()->route('workCatg')->with('success','updated successfully');

    }
    function delete(Request $request, $id){
        $wc = WorkCatg::find($id);
        $wc->wc_status = "deleted";
        $wc->save();
        return redirect()->route('workCatg')->with('success','updated successfully');
    }
}
