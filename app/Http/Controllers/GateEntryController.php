<?php

namespace App\Http\Controllers;

use App\Models\GateEntry;
use App\Models\Party;
use App\Models\PO;
use App\Models\POItem;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GateEntryController extends Controller
{
    function index(Request $request){
        $enteries = GateEntry::fetch()->where('ge_grn_status',false)->get();
        return view('pages.gate_entry.list',compact('enteries'));
    }
    function add(Request $request){
        $parties = Party::fetch()->get();
        $setting = Setting::fetch()->first();
        $gate_entry_no = $setting->set_gate_pre.$setting->set_gate_no+1;
        return view('pages.gate_entry.add',compact('parties','gate_entry_no'));
    }
    function addPost(Request $request){

        $setting = Setting::fetch()->first();
        $gate_entry_no = $setting->set_gate_pre.$setting->set_gate_no+1;
        $ge = new GateEntry();
        $gate = DB::table('gate')
        ->where('gate_comp_id', Auth::user()->emp_comp_id)
        ->first();
        $ge->ge_comp_id = Auth::user()->emp_comp_id;
        $ge->ge_party_id = $request->ge_party_id;
        $ge->ge_emp_id = Auth::user()->emp_id;
        $ge->ge_gate_id = $gate->gate_id;
        $ge->ge_date = $request->ge_date;
        $ge->ge_number = $gate_entry_no;
        $ge->ge_ref_type = $request->ge_ref_type;
        $ge->ge_ref_number = $request->ge_ref_number;
        $ge->ge_grn_status = false;
        $ge->ge_status = "ok";
        $ge->save();
        $setting->set_gate_no = $setting->set_gate_no+1;
        $setting->save();
        return redirect()->route('gateEntryItem',$ge->ge_id)->with('success','Added successfully');
    }
    function edit(Request $request,$id){
        $parties = Party::fetch()->get();
        $ge = GateEntry::find($id);
        return view('pages.gate_entry.edit',compact('parties','ge'));
    }
    function editPost(Request $request,$id){
        $ge =  GateEntry::find($id);
        
        $ge->ge_party_id = $request->ge_party_id;
        $ge->ge_emp_id = Auth::user()->emp_id;
        $ge->ge_date = $request->ge_date;
        $ge->ge_ref_type = $request->ge_ref_type;
        $ge->ge_ref_number = $request->ge_ref_number;
        $ge->save();
        return redirect()->route('gateEntry')->with('success','Updated successfully');
    }
    function delete(Request $request,$id){
        $ge =  GateEntry::find($id);
        $ge->ge_status = "deleted";
        $ge->save();
    }
    function purchaseIn(Request $request){
        return view('pages.gate_entry.purchaseIn');
    }
    function purchaseInPost(Request $request){
        $po = PO::where('po_number',$request->po_number)->first(); 
        //dd($po);
        return redirect()->route('purchaseInItem',['id'=>$po->po_id]);
    }
    function purchaseInItem(Request $request){
        $po = PO::where('po_id',$request->id)->first();
        return view('pages.gate_entry.purchaseInItem',compact('po'));
    }
    function purchaseInItemPost(Request $request){
        $inputs = $request->all();
        $po = PO::where('po_id',$request->id)->first();
        foreach ($inputs as $key => $value) {
            if (str_ends_with($key, '_r')) { 
                $poi_id = substr($key, 0, -2);
                $poi = POItem::find($poi_id);
                //dd($poi);
                $poi->poi_qty_receive = $poi->poi_qty_receive + $value;
                $poi->save(); 
            } 
        }
        $pois = POItem::where('poi_po_id',$request->id)->get();
        foreach($pois as $item){
            if($item->poi_qty !=  $item->poi_qty_receive){
                return view('pages.gate_entry.purchaseInItem',compact('po'));
            }
        }
        $po->po_dev_status = "delivered";
        $po->save();
        return view('pages.gate_entry.purchaseInItem',compact('po'));
    }
}
