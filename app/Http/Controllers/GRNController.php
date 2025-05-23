<?php

namespace App\Http\Controllers;

use App\Models\DcInr;
use App\Models\DcInrItem;
use App\Models\DcIr;
use App\Models\DcIrItem;
use App\Models\GateEntry;
use App\Models\GateEntryItem;
use App\Models\GRN;
use App\Models\GRNItem;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GRNController extends Controller
{
    function index(Request $request){
        $ges = GateEntry::where('ge_grn_status',false)->get();
        return view('pages.grn.list',compact('ges'));
    }
    function view(Request $request,$id){
        $ge = GateEntry::find($id);
        $geis = GateEntryItem::where("gei_ge_id",$id)->get();
        return view('pages.grn.view',compact('ge','geis'));
    }
    function book(Request $request,$id){
        $ge = GateEntry::find($id);
        $setting = Setting::fetch()->first();
        $grn_no = $setting->set_grn_pre.$setting->set_grn_no+1;
        $geis = GateEntryItem::where('gei_ge_id',$id)->get();
        $grn = new GRN();
        $grn->grn_comp_id = Auth::user()->emp_comp_id;
        $grn->grn_emp_id = Auth::user()->emp_id;
        $grn->grn_party_id = $ge->ge_party_id;
        $grn->grn_ge_id = $id;
        $grn->grn_number = $grn_no;
        $grn->grn_date = date("Y-m-d");
        $grn->grn_remark = "";
        $grn->grn_status = "ok";
        $grn->save();
        $setting->set_grn_no = $setting->set_grn_no+1;
        $setting->save();
        $ge->ge_grn_status = true;
        $ge->save();
        if($ge->ge_ref_type == "Invoice"){
            $purch = new Purchase();
            $purch->purch_comp_id = Auth::user()->emp_comp_id;
            $purch->purch_party_id = $ge->ge_party_id;
            $purch->purch_emp_id = Auth::user()->emp_id;
            $purch->purch_date = $ge->ge_ref_date ?? now();
            $purch->purch_number = $ge->ge_ref_number;
            $purch->purch_status = "ok";
            $purch->purch_total = 0;
            $purch->save();
        }
        if($ge->ge_ref_type == "Inward non returnable DC"){
            $dcinr = new DcInr();
            $dcinr->dcinr_comp_id = Auth::user()->emp_comp_id;
            $dcinr->dcinr_party_id = $ge->ge_party_id;
            $dcinr->dcinr_emp_id = Auth::user()->emp_id;
            $dcinr->dcinr_date = $ge->ge_ref_date ?? now();
            $dcinr->dcinr_number = $ge->ge_ref_number;
            $dcinr->dcinr_status = "ok";
            $dcinr->save();
        }
        if($ge->ge_ref_type == "Inward returnable DC"){
            $dcir = new DcIr();
            $dcir->dcir_comp_id = Auth::user()->emp_comp_id;
            $dcir->dcir_party_id = $ge->ge_party_id;
            $dcir->dcir_emp_id = Auth::user()->emp_id;
            $dcir->dcir_date = $ge->ge_ref_date ?? now();
            $dcir->dcir_number = $ge->ge_ref_number;
            $dcir->dcir_return_status = "pending";
            $dcir->dcir_status = "ok";
            $dcir->save();
        }
        
        $p_total = 0;
        foreach($geis as $gei){
            $grni = new GRNItem();
            $grni->grni_grn_id = $grn->grn_id;
            $grni->grni_item_id = $gei->gei_item_id;
            $grni->grni_tax_id = $gei->gei_tax_id;
            $grni->grni_qty = $gei->gei_qty;
            $grni->grni_rate = $gei->gei_rate;
            $grni->save();

            $item = Item::find($gei->gei_item_id);
            $item->item_stock = $item->item_stock + $gei->gei_qty;
            if($gei->gei_rate != null){
                $item->item_rate = $gei->gei_rate;
            }
            $item->save();

            DB::table('stock_log')->insert([
                'sl_item_id' => $gei->gei_item_id,
                'sl_comp_id' => Auth::user()->emp_comp_id,
                'sl_emp_id' => Auth::user()->emp_id,
                'sl_type' => "in",
                'sl_doc_type' => $ge->ge_ref_type,
                'sl_doc_no' => $ge->ge_ref_number,
                'sl_qty' => $gei->gei_qty,
                'sl_created_by' => Auth::user()->emp_id,
                'sl_updated_by' => Auth::user()->emp_id,
                'sl_created_on' => now(),
                'sl_updated_on' => now(),
            ]);

            if($ge->ge_ref_type == "Invoice"){
                $t_total = $gei->gei_qty * $gei->gei_rate;
                $t_tax = $t_total * $gei->tax->tax_percent / 100;
                $t_total = $t_total + $t_tax;
                $pi = new PurchaseItem();
                $pi->pi_purch_id = $purch->purch_id;
                $pi->pi_item_id = $gei->gei_item_id;
                $pi->pi_tax_id = $gei->gei_tax_id;
                $pi->pi_rate = $gei->gei_rate;
                $pi->pi_qty = $gei->gei_qty;
                $pi->pi_discount = 0;
                $pi->pi_tax = $t_tax;
                $pi->pi_total = $t_total;
                $pi->pi_hsn = "";
                $pi->save();
                $p_total = $p_total + $t_total;
            }
            if($ge->ge_ref_type == "Inward non returnable DC"){
                
                $dci = new DcInrItem();
                $dci->dcinri_dcinr_id = $dcinr->dcinr_id;
                $dci->dcinri_item_id = $gei->gei_item_id;
                $dci->dcinri_qty = $gei->gei_qty;
                $dci->dcinri_remark = "-";
                $dci->dcinri_status = "ok";
                $dci->dcinri_balance = 0;
                $dci->save();
            }
            if($ge->ge_ref_type == "Inward returnable DC"){
                
                $dci = new DcIrItem();
                $dci->dciri_dcir_id = $dcir->dcir_id;
                $dci->dciri_item_id = $gei->gei_item_id;
                $dci->dciri_qty = $gei->gei_qty;
                $dci->dciri_remark = "-";
                $dci->dciri_status = "ok";
                $dci->dciri_balance = $gei->gei_qty;
                $dci->save();
            }

        }
        if($ge->ge_ref_type == "Invoice"){
            $purch->purch_total = $p_total;
            $purch->save();
        }
        return redirect()->route('grn')->with('success','Add successfully');
    }
    function add(Request $request){
        
    }
    function addPost(Request $request){
        
    }
    function edit(Request $request,$id){
        
    }
    function editPost(Request $request,$id){
        
    }
    function delete(Request $request){
        
    }
}
