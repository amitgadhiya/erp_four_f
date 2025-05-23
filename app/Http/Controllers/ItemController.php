<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Setting;
use App\Models\Tax;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    function index(Request $request){
        //dd(Auth::user()->user_comp_id);
        $items = Item::fetch()->get();
        
        return view("pages.item.list" ,compact('items'));
    }
    function add(Request $request){
        
        $taxs = Tax::fetch()->get();
        $setting = Setting::fetch()->first();
        $ics = ItemCategory::fetch()->get();
        $units = Unit::fetch()->get();
        $set_item_no = $setting->set_item_pre.sprintf('%04d', $setting->set_item_no+1);
        return view("pages.item.add",compact('taxs','set_item_no','ics','units'));
    }
    function addPost(Request $request){
        $request->validate([
            'item_name' => 'required|string|max:255',
            'item_code' => 'required|string',
            
        ]);
    
    
        // Create the gst instance and set properties
        $item = new Item();
        $item->item_name = $request->item_name;
        $item->item_tax_id = $request->item_tax_id;
        $item->item_code = $request->item_code;
        $item->item_catg_id = $request->item_type;
        $item->item_unit_id = $request->item_uom;
        $item->item_size = $request->item_size;
        $item->item_hsn = $request->item_hsn;
        $item->item_make = $request->item_make;
        $item->item_stock = $request->item_stock;
        $item->item_min_alert = $request->item_min_stock;
        $item->item_comp_id = Auth::user()->emp_comp_id;
        $item->item_created_by = Auth::user()->emp_comp_id;
        $item->item_updated_by = Auth::user()->emp_comp_id;
        $item->item_status = 'ok'; // Assuming 'Active' as the default status
    
        // Save the gst instance to the database
        $item->save();
        $setting = Setting::fetch()->first();
        $setting->set_item_no = $setting->set_item_no+1;
        $setting->save();
    
        // Redirect back with a success message
        return redirect()->route('item')->with('success', 'Item added successfully');
    }
    function log(Request $request,$id){
        $item = Item::fetch()->find($id);
        $taxs = Tax::fetch()->get();
        $ics = ItemCategory::fetch()->get();
        $units = Unit::fetch()->get();
        $stock_log = DB::table('stock_log')
        ->join('items', 'sl_item_id', '=', 'item_id')
        ->join('emps', 'emp_id', '=', 'sl_updated_by')
        ->where('sl_item_id',$id)
        ->orderBy('sl_id', 'desc')
        ->get();
        // dd($item->tax);
        return view("pages.item.log",compact('item','taxs','ics','units','stock_log'));
    }
    function edit(Request $request,$id){
        $item = Item::fetch()->find($id);
        $taxs = Tax::fetch()->get();
        $ics = ItemCategory::fetch()->get();
        $units = Unit::fetch()->get();
        
        // dd($item->tax);
        return view("pages.item.edit",compact('item','taxs','ics','units'));
    }
    function editPost(Request $request,$id){
           // Validate the incoming request
    $request->validate([
        'item_name' => 'required|string|max:255',
        'item_code' => 'required|string',
        
    ]);

    // Find the gst by ID
    $item = Item::findOrFail($id);

    

    $item->item_name = $request->item_name;
    $item->item_tax_id = $request->item_tax_id;
    $item->item_code = $request->item_code;
    $item->item_catg_id = $request->item_type;
    $item->item_unit_id = $request->item_uom;
    $item->item_size = $request->item_size;
    $item->item_hsn = $request->item_hsn;
    $item->item_make = $request->item_make;
    $item->item_stock = $request->item_stock;
    $item->item_min_alert = $request->item_min_stock;
    $item->item_updated_by = Auth::user()->emp_comp_id;
    
    // Save the updated gst
    $item->save();

    // Redirect back with success message
    return redirect()->route('item')->with('success', 'item updated successfully');
    }
    function delete(Request $request,$id){
        $item = Item::findOrFail($id);
        $item->item_status = "deleted";
        $item->save(); 
        return redirect()->back()->with('success', 'item deleted successfully!');
    }
}
