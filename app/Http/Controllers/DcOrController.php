<?php

namespace App\Http\Controllers;

use App\Models\DcOr;
use App\Models\Item;
use App\Models\Party;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DcOrController extends Controller
{
    function index(Request $request){
        $dcs = DcOr::fetch()->get();
        return view('pages.dcor.list',compact('dcs'));
    }
    function add(Request $request){
        $setting = Setting::fetch()->first();
        $dcor_no = $setting->set_dcor_pre.date("y")."-".$setting->set_dcor_no+1;
        $parties = Party::fetch()->get();
        return view('pages.dcor.add',compact('parties','dcor_no'));
    }
    function addPost(Request $request){
        $dc = new DcOr();
        $dc->dcor_comp_id = Auth::user()->emp_comp_id;
        $dc->dcor_emp_id = Auth::user()->emp_id;
        $dc->dcor_party_id = $request->dcor_party_id;
        $dc->dcor_date = $request->dcor_date;
        $dc->dcor_number = $request->dcor_number;
        $dc->dcor_remark = $request->dcor_remark;
        $dc->dcor_status = "ok";
        $dc->dcor_return_status = "pending";
        $dc->dcor_dispactch_status = "pending";
        $dc->save();
        $setting = Setting::fetch()->first();
        $setting->set_dcor_no=$setting->set_dcor_no+1;
        $setting->save();
        return redirect()->route('dcorItemAdd',$dc->dcor_id)->with('success','Added Successfully');
    }
    function edit(Request $request,$id){
        $parties = Party::fetch()->get();
        $dc = DcOr::find($id);
        return view('pages.dcor.edit',compact('parties','dc'));
    }
    function view(Request $request,$id){
        $parties = Party::fetch()->get();
        $dc = DcOr::find($id);
        //dd($dc->items);
        return view('pages.dcor.view',compact('parties','dc'));
    }
    function editPost(Request $request,$id){
        $dc = DcOr::find($id);
        $dc->dcor_party_id = $request->dcor_party_id;
        $dc->dcor_date = $request->dcor_date;
        $dc->dcor_number = $request->dcor_number;
        $dc->dcor_remark = $request->dcor_remark;
        $dc->save();
        return redirect()->route('dcor')->with('success','Updated Successfully');

    }
    function dispatch(Request $request,$id){
        $dc = DcOr::find($id);
        $dc->dcor_dispactch_by = Auth::user()->emp_id;
        $dc->dcor_dispactch_date = now();
        $dc->dcor_dispactch_status = "done";
        $dc->save();
        foreach($dc->items as $dcitem){
            DB::table('stock_log')->insert([
                'sl_item_id' => $dcitem->dcori_item_id,
                'sl_comp_id' => Auth::user()->emp_comp_id,
                'sl_emp_id' => Auth::user()->emp_id,
                'sl_type' => "out",
                'sl_doc_type' => 'DC-O-R',
                'sl_doc_no' => $dc->dcor_number,
                'sl_qty' => $dcitem->dcori_qty,
                'sl_created_by' => Auth::user()->emp_id,
                'sl_updated_by' => Auth::user()->emp_id,
                'sl_created_on' => now(),
                'sl_updated_on' => now(),
            ]);
            $item = Item::find($dcitem->dcori_item_id);
            $item->item_stock = $item->item_stock-$dcitem->dcori_qty;
            $item->save();
        }
        return redirect()->route('dcor')->with('success','Dispatch Successfully');
    }
    function delete(Request $request,$id){
        $dc = DcOr::find($id);
        $dc->dcor_status = "deleted";
        $dc->save();
        return redirect()->route('dcor')->with('success','Deleted Successfully');
    }
}
