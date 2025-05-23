<?php

namespace App\Http\Controllers;

use App\Models\ProductionWork;
use App\Models\Project;
use App\Models\WorkCatg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductionWorkController extends Controller
{
    function index(Request $request){
        $workLogs=ProductionWork::fetch()->where('pw_start_time','>=',date('Y-m-d',strtotime('-1 day')).' 00:00:00')->where('pw_emp_id',Auth::user()->emp_id)->get();
        return view('pages.production-work.list',compact('workLogs'));
    }
    function add(Request $request){
        $projects = Project::fetch()->get();
        $wcs = WorkCatg::fetch()->where('wc_type','production')->get();
        return view('pages.production-work.add',compact('projects','wcs'));
    }
    function addPost(Request $request){
        $start = strtotime($request->date." ".$request->start_time.":00");
        $end = strtotime($request->date." ".$request->end_time.":00");

        $minutes = ($end - $start) / 60;

        $pw = new ProductionWork();
        $pw->pw_comp_id = Auth::user()->emp_comp_id;
        $pw->pw_emp_id = Auth::user()->emp_id;
        $pw->pw_pro_id = $request->project;
        $pw->pw_start_time = $request->date." ".$request->start_time.":00";
        $pw->pw_end_time = $request->date." ".$request->end_time.":00" ;
        $pw->pw_total_min = $minutes;
        $pw->pw_catg_id = $request->work_category;
        $pw->pw_desc = $request->work_desc;
        $pw->pw_status ="ok";
        $pw->save();
        return redirect()->route('productionWork')->with('success',"Added successfully");
    }
    function edit(Request $request, $id){
        $projects = Project::fetch()->get();
        $wcs = WorkCatg::fetch()->where('wc_type','production')->get();
        $pw = ProductionWork::find($id);
        //dd($dw);
        return view('pages.production-work.edit',compact('projects','wcs','pw'));
    }
    function editPost(Request $request, $id){
        $start = strtotime($request->date." ".$request->start_time.":00");
        $end = strtotime($request->date." ".$request->end_time.":00");

        $minutes = ($end - $start) / 60;
        $pw =  ProductionWork::find($id);
        $pw->pw_pro_id = $request->project;
        $pw->pw_start_time = $request->date." ".$request->start_time.":00";
        $pw->pw_end_time = $request->date." ".$request->end_time.":00";
        $pw->pw_catg_id = $request->work_category;
        $pw->pw_desc = $request->work_desc;
        $pw->pw_total_min = $minutes;
        $pw->save();
        return redirect()->route('productionWork')->with('success',"Updated successfully");
    }
    function delete(Request $request, $id){
        $pw =  ProductionWork::find($id);
        $pw->pw_status = "deleted";
        $pw->save();
        return redirect()->route('productionWork')->with('success',"Deleted successfully");
    }
}
