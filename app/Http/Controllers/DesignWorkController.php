<?php

namespace App\Http\Controllers;

use App\Models\DesignWork;
use App\Models\Enquiry;
use App\Models\WorkCatg;
use App\Models\Project;
use Illuminate\Container\Attributes\Auth as AttributesAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignWorkController extends Controller
{
    function index(Request $request){
        $workLogs=DesignWork::fetch()->where('dw_start_time','>=',date('Y-m-d',strtotime('-1 day')).' 00:00:00')->where('dw_emp_id',Auth::user()->emp_id)->get();
        return view('pages.design-work.list',compact('workLogs'));
    }
    function add(Request $request){
        $projects = Project::fetch()->get();
        $enquiries = Enquiry::fetch()->get();
        $wcs = WorkCatg::fetch()->where('wc_type','design')->get();
        return view('pages.design-work.add',compact('projects','wcs','enquiries'));
    }
    function addPost(Request $request){
        $dw = new DesignWork();
        $start = strtotime($request->date." ".$request->start_time.":00");
        $end = strtotime($request->date." ".$request->end_time.":00");
        $firstLetter = strtoupper(substr($request->project, 0, 1)); 
        $id = substr($request->project, 2);
        if($firstLetter == "P"){
            $dw->dw_pro_id = $id;
        }else{
            $dw->dw_enq_id = $id;
        }

        $minutes = ($end - $start) / 60;

        
        $dw->dw_comp_id = Auth::user()->emp_comp_id;
        $dw->dw_emp_id = Auth::user()->emp_id;
        $dw->dw_start_time = $request->date." ".$request->start_time.":00";
        $dw->dw_end_time = $request->date." ".$request->end_time.":00" ;
        $dw->dw_total_min = $minutes;
        $dw->dw_catg_id = $request->work_category;
        $dw->dw_desc = $request->work_desc;
        $dw->dw_status ="ok";
        $dw->save();
        return redirect()->route('designWork')->with('success',"Added successfully");

    }
    function edit(Request $request,$id){
        $projects = Project::fetch()->get();
        $wcs = WorkCatg::fetch()->where('wc_type','design')->get();
        $dw = DesignWork::find($id);
        //dd($dw);
        return view('pages.design-work.edit',compact('projects','wcs','dw'));
        
    }
    function editPost(Request $request,$id){
        
        $start = strtotime($request->date." ".$request->start_time.":00");
        $end = strtotime($request->date." ".$request->end_time.":00");

        $minutes = ($end - $start) / 60;
        $dw =  DesignWork::find($id);
        $firstLetter = strtoupper(substr($request->project, 0, 1)); 
        $id_1 = substr($request->project, 2);
        if($firstLetter == "P"){
            $dw->dw_pro_id = $id_1;
        }else{
            $dw->dw_enq_id = $id_1;
        }
        $dw->dw_start_time = $request->date." ".$request->start_time.":00";
        $dw->dw_end_time = $request->date." ".$request->end_time.":00";
        $dw->dw_catg_id = $request->work_category;
        $dw->dw_desc = $request->work_desc;
        $dw->dw_total_min = $minutes;
        $dw->save();
        return redirect()->route('designWork')->with('success',"Updated successfully");
    }
    function delete(Request $request,$id){
        
        $dw =  DesignWork::find($id);

        $dw->dw_status = "deleted";
        $dw->save();
        return redirect()->route('designWork')->with('success',"Deleted successfully");
    }
}
