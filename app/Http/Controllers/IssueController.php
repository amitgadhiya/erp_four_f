<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Emp;
use App\Models\Item;
use App\Models\Project;
use App\Models\ProjectElement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IssueController extends Controller
{
    function index(){
        $depts = Department::fetch()->get();
        $emps = Emp::fetch()->get();
        $items = Item::fetch()->where('item_stock',">","0")->get();
        return view('pages.issue.add',compact('depts','emps','items'));
    }
    function indexPost(Request $request){
        $item = Item::find($request->item);
        $item->item_stock = $item->item_stock - $request->qty;
        $item->save();

        DB::table('stock_log')->insert([
            'sl_item_id' => $item->item_id,
            'sl_comp_id' => Auth::user()->emp_comp_id,
            'sl_emp_id' => Auth::user()->emp_id,
            'sl_type' => "out",
            'sl_doc_type' => "issue",
            'sl_doc_no' => "",
            'sl_qty' => $request->qty,
            'sl_created_by' => Auth::user()->emp_id,
            'sl_updated_by' => Auth::user()->emp_id,
            'sl_created_on' => now(),
            'sl_updated_on' => now(),
        ]);
        
        $ds = DB::table('dept_stock')
        ->where('ds_dept_id',$request->dept)
        ->where('ds_item_id',$item->item_id)
        ->first();
        if($ds){
            DB::table('dept_stock')
            ->where('ds_dept_id',$request->dept)
            ->where('ds_item_id',$item->item_id)
            ->update([
                'ds_stock' =>$ds->ds_stock + $request->qty,
            ]);
        }else{
            DB::table('dept_stock')->insert([
                'ds_dept_id' =>$request->dept,
                'ds_item_id' =>$request->item,
                'ds_stock' =>$request->qty,
            ]);
        }
        
        return redirect()->back()->with("success","Issue Successfull");
    }
    function search(Request $request){
        $projects = Project::fetch()->get();
        return view('pages.issue.add-by-project',compact('projects'));
    }
    function searchPost(Request $request){
        $depts = Department::fetch()->get();
        $emps = Emp::fetch()->get();
        $projects = Project::fetch()->get();
        $elements = ProjectElement::where('ele_pro_id',$request->project)->get();
        $items = Item::fetch()->where('item_stock',">","0")->get();
        return view('pages.issue.add-by-project',compact('depts','emps','items','projects','elements'));
    }
    function indexByProject(){
        $depts = Department::fetch()->get();
        $emps = Emp::fetch()->get();
        $projects = Project::fetch()->get();
        $items = Item::fetch()->where('item_stock',">","0")->get();
        return view('pages.issue.add-by-project',compact('depts','emps','items','projects'));
    }
}
