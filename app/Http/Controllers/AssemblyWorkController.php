<?php

namespace App\Http\Controllers;

use App\Models\AssemblyWork;
use App\Models\Project;
use App\Models\WorkCatg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssemblyWorkController extends Controller
{
    function index(Request $request){
        $workLogs=AssemblyWork::fetch()->where('aw_start_time','>=',date('Y-m-d',strtotime('-1 day')).' 00:00:00')->where('aw_emp_id',Auth::user()->emp_id)->get();
        return view('pages.assembly-work.list',compact('workLogs'));
    }
    function add(Request $request){
        $projects = Project::fetch()->get();
        $wcs = WorkCatg::fetch()->where('wc_type','assembly')->get();
        return view('pages.assembly-work.add',compact('projects','wcs'));
    }
    function addPost(Request $request){
        $start = strtotime($request->date." ".$request->start_time.":00");
        $end = strtotime($request->date." ".$request->end_time.":00");

        $minutes = ($end - $start) / 60;

        $aw = new AssemblyWork();
        $aw->aw_comp_id = Auth::user()->emp_comp_id;
        $aw->aw_emp_id = Auth::user()->emp_id;
        $aw->aw_pro_id = $request->project;
        $aw->aw_start_time = $request->date." ".$request->start_time.":00";
        $aw->aw_end_time = $request->date." ".$request->end_time.":00" ;
        $aw->aw_total_min = $minutes;
        $aw->aw_catg_id = $request->work_category;
        $aw->aw_desc = $request->work_desc;
        $aw->aw_status ="ok";
        $aw->save();
        return redirect()->route('assemblyWork')->with('success',"Added successfully");
    }
    function edit(Request $request, $id){
        $projects = Project::fetch()->get();
        $wcs = WorkCatg::fetch()->where('wc_type','assembly')->get();
        $aw = AssemblyWork::find($id);
        //dd($dw);
        return view('pages.assembly-work.edit',compact('projects','wcs','aw'));
    }
    function editPost(Request $request, $id){
        $start = strtotime($request->date." ".$request->start_time.":00");
        $end = strtotime($request->date." ".$request->end_time.":00");

        $minutes = ($end - $start) / 60;
        $aw =  AssemblyWork::find($id);
        $aw->aw_pro_id = $request->project;
        $aw->aw_start_time = $request->date." ".$request->start_time.":00";
        $aw->aw_end_time = $request->date." ".$request->end_time.":00";
        $aw->aw_catg_id = $request->work_category;
        $aw->aw_desc = $request->work_desc;
        $aw->aw_total_min = $minutes;
        $aw->save();
        return redirect()->route('assemblyWork')->with('success',"Updated successfully");
    }
    function delete(Request $request, $id){
        $aw =  AssemblyWork::find($id);
        $aw->aw_status = "deleted";
        $aw->save();
        return redirect()->route('assemblyWork')->with('success',"Deleted successfully");
    }
}
