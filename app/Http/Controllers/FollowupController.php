<?php

namespace App\Http\Controllers;

use App\Models\Followup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowupController extends Controller
{
    function index(Request $request,$id){
        $followups = Followup::fetch($id)->get();
        return view('pages.followup.list',compact(['followups']));
    }
    function add(Request $request,$id){
        return view('pages.followup.add');
    }
    function addPost(Request $request,$id){
        $followup = new Followup();
        $followup->fu_done_date = $request->fu_done_date;
        $followup->fu_do_date = $request->fu_do_date;
        $followup->fu_with = $request->fu_with;
        $followup->fu_remark = $request->fu_remark;
        $followup->fu_emp_id = Auth::user()->emp_id;
        $followup->fu_quot_id = $id;
        $followup->save();
        return redirect()->route('followup',$id)->with('success', 'Saved successfully.');
    }
    function edit(Request $request,$pid,$id){
        $followup = Followup::find($id);
        return view('pages.followup.edit',compact('followup'));
    }
    function editPost(Request $request,$pid,$id){
        $followup =  Followup::find($id);
        $followup->fu_done_date = $request->fu_done_date;
        $followup->fu_do_date = $request->fu_do_date;
        $followup->fu_with = $request->fu_with;
        $followup->fu_remark = $request->fu_remark;
        $followup->fu_emp_id = Auth::user()->emp_id;
        $followup->save();
        return redirect()->route('followup',['id'=>$pid])->with('success', 'Updated successfully.');
    }
    function delete(Request $request,$pid,$id){
        $followup = Followup::findOrFail($id);
        $followup->delete(); 
        return redirect()->back()->with('success', 'Deleted successfully!');
    }

}
