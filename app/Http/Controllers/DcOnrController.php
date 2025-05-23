<?php

namespace App\Http\Controllers;

use App\Models\DcOnr;
use App\Models\Item;
use App\Models\Party;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DcOnrController extends Controller
{
    function index(Request $request){
        $dcs = DcOnr::fetch()->get();
        return view('pages.dconr.list',compact('dcs'));
    }
    function add(Request $request){
        $setting = Setting::fetch()->first();
        $dconr_no = $setting->set_dconr_pre.date("y")."-".$setting->set_dconr_no+1;
        $parties = Party::fetch()->get();
        return view('pages.dconr.add',compact('parties','dconr_no'));
    }
    function addPost(Request $request){
        $dc = new DcOnr();
        $dc->dconr_comp_id = Auth::user()->emp_comp_id;
        $dc->dconr_emp_id = Auth::user()->emp_id;
        $dc->dconr_party_id = $request->dconr_party_id;
        $dc->dconr_date = $request->dconr_date;
        $dc->dconr_number = $request->dconr_number;
        $dc->dconr_remark = $request->dconr_remark;
        $dc->dconr_status = "ok";
        $dc->dconr_dispactch_status = "pending";
        $dc->save();
        $setting = Setting::fetch()->first();
        $setting->set_dconr_no=$setting->set_dconr_no+1;
        $setting->save();
        return redirect()->route('dconrItemAdd',$dc->dconr_id)->with('success','Added Successfully');
    }
    function edit(Request $request,$id){
        $parties = Party::fetch()->get();
        $dc = DcOnr::find($id);
        return view('pages.dconr.edit',compact('parties','dc'));
    }
    function dispatch(Request $request,$id){
        $dc = DcOnr::find($id);
        $dc->dconr_dispactch_by = Auth::user()->emp_id;
        $dc->dconr_dispactch_date = now();
        $dc->dconr_dispactch_status = "done";
        $dc->save();
        foreach($dc->items as $dcitem){
            DB::table('stock_log')->insert([
                'sl_item_id' => $dcitem->dconri_item_id,
                'sl_comp_id' => Auth::user()->emp_comp_id,
                'sl_emp_id' => Auth::user()->emp_id,
                'sl_type' => "out",
                'sl_doc_type' => 'DC-O-NR',
                'sl_doc_no' => $dc->dconr_number,
                'sl_qty' => $dcitem->dconri_qty,
                'sl_created_by' => Auth::user()->emp_id,
                'sl_updated_by' => Auth::user()->emp_id,
                'sl_created_on' => now(),
                'sl_updated_on' => now(),
            ]);
            $item = Item::find($dcitem->dconri_item_id);
            $item->item_stock = $item->item_stock-$dcitem->dconri_qty;
            $item->save();
        }
        return redirect()->route('dconr')->with('success','Dispatch Successfully');
    }
    function view(Request $request,$id){
        $parties = Party::fetch()->get();
        $dc = DcOnr::find($id);
        return view('pages.dconr.view',compact('parties','dc'));
    }
    function editPost(Request $request,$id){
        $dc = DcOnr::find($id);
        $dc->dconr_party_id = $request->dconr_party_id;
        $dc->dconr_date = $request->dconr_date;
        $dc->dconr_number = $request->dconr_number;
        $dc->dconr_remark = $request->dconr_remark;
        $dc->save();
        return redirect()->route('dconr')->with('success','Updated Successfully');

    }
    function delete(Request $request,$id){
        $dc = DcOnr::find($id);
        $dc->dconr_status = "deleted";
        $dc->save();
        return redirect()->route('dconr')->with('success','Deleted Successfully');
    }
}
