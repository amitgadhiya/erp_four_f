<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Project;
use App\Models\ProjectElement;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ProjectElementController extends Controller
{
    // List all elements (optionally filter by project)
    public function index(Request $request,$id)
    {

        $elements = ProjectElement::fetch($id)->orderBy('ele_id', 'desc')->get();
        if($elements->count()>0){
            
            $element = $elements->first();
            $parts = explode('-', $element->ele_code);
            $lastPart = end($parts);
            $ele_count = ltrim($lastPart,"0");
        }else{
            $ele_count = 0;
        }
        //$ele_code = "E-".$id."-".$ele_count+1;
        $project = Project::find($id);
        $items = Item::fetch()->get();

        return view('pages.element.list', compact('elements','project','items'));
    }

    // Show add element form
    public function add(Request $request)
    {
        
    }

    // Handle add form submission
    public function addPost(Request $request,$id)
    {
        
        $item = Item::find($request->ele_item_id);

        $element = new ProjectElement();

        $element->ele_pro_id = $id;
        $element->ele_item_id = $item->item_id;
        $element->ele_name = $request->ele_name;
        $element->ele_code = $request->ele_code;
        $element->ele_qty = $request->ele_qty;
        $element->ele_type = $request->ele_type;
        $element->ele_material = $request->ele_material;
        $element->ele_size = $request->ele_size;
        $element->ele_rate = $item->item_rate;
        $element->ele_prod_status = "";
        $element->ele_order_status = "";
        $element->ele_status = 'ok';
        $element->save();

        return redirect()->route('projectElement',$id)->with('success', 'Element added successfully.');
    }

    function addExcel(Request $request,$id){
        //dd("hh");
        $data = Excel::toArray([], $request->file('excelFile'));
        $sheet = $data[0];
        $i = 12;
        $item_catg = ItemCategory::fetch()->where('ic_shot','RM')->first();
        $unit = Unit::fetch()->where('unit_name','Nos')->first();
        //if($sheet[$i][1] != null)
        while($sheet[$i][1] != null ){
            
            $item = new Item();
            $item->item_name = $sheet[$i][2];
            $item->item_code = "E-".$id."-".$sheet[$i][1];
            $item->item_catg_id = $item_catg->ic_id;
            $item->item_unit_id = $unit->unit_id;
            $item->item_size = $sheet[$i][4];
            $item->item_hsn = "";
            $item->item_make = "";
            $item->item_stock = 0;
            $item->item_min_alert = 0;
            $item->item_rate = 0;
            $item->item_comp_id = Auth::user()->emp_comp_id;
            $item->item_created_by = Auth::user()->emp_comp_id;
            $item->item_updated_by = Auth::user()->emp_comp_id;
            $item->item_status = 'ok'; 
            $item->save();

            $element = new ProjectElement();

            $element->ele_pro_id = $id;
            $element->ele_item_id = $item->item_id;
            $element->ele_name = $sheet[$i][2];
            $element->ele_code = "E-".$id."-".$sheet[$i][1];
            $element->ele_qty = $sheet[$i][5];
            $element->ele_type = "Manufacturing";
            $element->ele_material = $sheet[$i][3];
            $element->ele_size = $sheet[$i][4];
            $element->ele_rate = 0;
            $element->ele_prod_status = "";
            $element->ele_order_status = "";
            $element->ele_status = 'ok';
            $element->save();


            $i++;
        }
        //dd($sheet[43][1]);
        return redirect()->route('projectElement',request('id'))->with('success', 'Element added successfully.');
    
    }

    // Show edit form
    public function edit(Request $request,$pid, $id)
    {
        $element = ProjectElement::findOrFail($id);
        $project = Project::find($element->ele_pro_id);

        return view('pages.element.edit', compact('element','project'));
    }

    // Handle edit form submission
    public function editPost(Request $request,$pid, $id)
    {
        $element = ProjectElement::find($id);
        $element->ele_name = $request->ele_name;
        $element->ele_code = $request->ele_code;
        $element->ele_qty = $request->ele_qty;
        $element->ele_type = $request->ele_type;
        $element->ele_material = $request->ele_material;
        $element->ele_size = $request->ele_size;
        $element->save();
        
        

        return redirect()->route('projectElement',$pid)->with('success', 'Element updated successfully.');
    }

    // Soft delete
    public function delete(Request $request,$pid,$id)
    {
        

        $element = ProjectElement::findOrFail($request->id);
        $element->ele_status = 'deleted';
        $element->save();

        return redirect()->back()->with('success', 'Element deleted successfully.');
    }
    
}
