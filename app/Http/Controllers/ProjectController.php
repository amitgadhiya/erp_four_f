<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Party;
use App\Models\Project;
use App\Models\ProjectElement;
use App\Models\Quotation;
use App\Models\QuotationD;
use App\Models\Setting;
use App\Models\Unit;
use App\Models\Vender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    function index(Request $request){
        $projects = Project::fetch()->get();
        return view('pages.project.list',compact('projects'));
    }
    function add(Request $request,$id){
        $units = Unit::fetch()->get();
        $catgs = ItemCategory::fetch()->get();
        $quot = Quotation::find($id);
        $setting = Setting::fetch()->first();
        $pro_no = $setting->set_pro_pre.date('y')."-".sprintf('%04d', $setting->set_pro_no+1);
        return view('pages.project.add',compact('pro_no','quot','units','catgs'));
    }
    function addPost(Request $request){
        $selectedIndex = $request->input('item');
        $selectedItem = $request->input("items.$selectedIndex");


        $setting = Setting::fetch()->first();
        $set_item_no = $setting->set_item_pre.sprintf('%04d', $setting->set_item_no+1);
        $quot_item = QuotationD::find($selectedItem['qd_id']);
        $item = new Item();
        $item->item_name = $request->pro_name;
        $item->item_tax_id = $quot_item->qd_tax_id;
        $item->item_code = $set_item_no;
        $item->item_catg_id = $request->item_catg_id;
        $item->item_unit_id = $request->item_unit_id;
        $item->item_size = "";
        $item->item_hsn = "";
        $item->item_make = "";
        $item->item_rate = $quot_item->qd_rate;
        $item->item_stock = 0;
        $item->item_min_alert = 0;
        $item->item_comp_id = Auth::user()->emp_comp_id;
        $item->item_created_by = Auth::user()->emp_comp_id;
        $item->item_updated_by = Auth::user()->emp_comp_id;
        $item->item_status = 'ok';
        $item->save();
        $setting->set_item_no = $setting->set_item_no+1;
        $setting->save();


        $set_pro_no = $setting->set_pro_pre.sprintf('%04d', $setting->set_pro_no+1);


        $project = new Project();
        $project->pro_comp_id = Auth::user()->emp_comp_id;
        $project->pro_party_id = $quot_item->quotation->quot_party_id;
        $project->pro_item_id = $item->item_id;
        $project->pro_quot_id = $quot_item->quotation->quot_id;
        $project->pro_number = $request->pro_no;
        $project->pro_name = $request->pro_name;
        $project->pro_desc = $request->pro_desc;
        $project->pro_end_date = $request->pro_end_date;
        $project->pro_po_date = $request->pro_po_date;
        $project->pro_po_number = $request->pro_po_number;
        $project->pro_input = $request->pro_input;
        $project->pro_dap = $request->pro_dap;
        $project->pro_dap_app = $request->pro_dap_app;
        $project->pro_final = $request->pro_final;
        $project->pro_qty = $selectedItem['qd_qty'];
        $project->pro_rate = $selectedItem['qd_rate'];
        $project->pro_discount =$selectedItem['qd_discount'];
        $project->pro_status = "ok";
        $project->save();
        $setting->set_pro_no = $setting->set_pro_no+1;
        $setting->save();

        return redirect()->route('project')->with('success','Added Successfully');
    }
    function edit(Request $request,$id){
        $project = Project::findOrFail($id);

        return view('pages.project.edit',compact('project'));
    }
    function editPost(Request $request,$id){
        $project = Project::findOrFail($id);

    
    $project->pro_name = $request->pro_name;
    $project->pro_desc = $request->pro_desc;
    $project->pro_end_date = $request->pro_end_date;
    $project->pro_po_date = $request->pro_po_date;
    $project->pro_po_number = $request->pro_po_number;
    $project->pro_input = $request->pro_input;
    $project->pro_dap = $request->pro_dap;
    $project->pro_dap_app = $request->pro_dap_app;
    $project->pro_final = $request->pro_final;
    $project->pro_qty = $request->pro_qty;
    $project->pro_rate = $request->pro_rate;
    $project->pro_discount = $request->pro_discount;

    $project->save();

    return redirect()->route('project')->with('success', 'Project updated successfully.');
    }
    function delete(Request $request){
        
    }
    
}
