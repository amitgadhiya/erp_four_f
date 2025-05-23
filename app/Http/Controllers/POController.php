<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemCategory;
use App\Models\Party;
use App\Models\PO;
use App\Models\POItem;
use App\Models\Project;
use App\Models\ProjectElement;
use App\Models\Setting;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class POController extends Controller
{
    function index(Request $request){
        $pos = PO::fetch()->get();
        
        return view('pages.po.list',compact('pos'));
    }
    function add(Request $request){
        $setting = Setting::fetch()->first();
        //dd($setting);
        $po_number = $setting->set_po_pre.date("y")."-".$setting->set_po_no+1;
        $parties = Party::fetch_vender()->get();
        //dd($po_number);
        return view('pages.po.add',compact('parties','po_number'));
    }
    function addPost(Request $request){
        $po = new PO();
        $po->po_comp_id = Auth::user()->emp_comp_id;
        $po->po_party_id = $request->po_party_id;
        $po->po_number = $request->po_number;
        $po->po_type = $request->po_type;
        $po->po_date = $request->po_date;
        $po->po_remark = $request->po_remark;
        $po->po_status = "ok";
        $po->save();
        $setting = Setting::fetch()->first();
        $setting->set_po_no = $setting->set_po_no+1;
        $setting->save();
        return redirect()->route('poItem',$po->po_id)->with('success','Added successfully');
    }
    function edit(Request $request,$id){
        $parties = Party::fetch_vender()->get();
        $po = PO::find($id);
        return view('pages.po.edit',compact('parties','po'));
    }
    function editPost(Request $request,$id){
        $po = PO::find($id);
        $po->po_party_id = $request->po_party_id;
        $po->po_type = $request->po_type;
        $po->po_date = $request->po_date;
        $po->po_remark = $request->po_remark;
        $po->save();
        return redirect()->route('po')->with('success','Updated successfully');
    }
    function view(Request $request,$id){
        $po = PO::find($id);
        return view('pages.po.view_1',compact('po'));
    }
    // Define the projectPOAdd method
    public function projectPOAdd(Request $request,$id)
    {
        $setting = Setting::fetch()->first();
        $po_number = $setting->set_po_pre.date('y')."-".$setting->set_po_no;
        $elements = ProjectElement::fetch($id)->get();
        $parties = Party::fetch_vender()->get();
        $project = Project::find($id);
        $taxes = Tax::fetch()->get();
        // Your logic goes here
        //return view('your.view.name');
        return view('pages.po.convert',compact('po_number','elements','parties','project','taxes'));
    }
    public function projectPOAddPost(Request $request,$id){
    $item_catg = ItemCategory::fetch()->where('ic_shot','RM')->first();
    $po = new PO();
    $po->po_comp_id = Auth::user()->emp_comp_id;
    $po->po_number = $request->po_no;
    $po->po_pro_id = $request->project_no;
    $po->po_number = $request->po_no;
    $po->po_party_id = $request->vender;
    $po->po_date = $request->project_end_date;
    $po->po_item_catg_id = $item_catg->ic_id;
    $po->po_remark = "-";
    $po->po_status = "ok";
    $po->save();
    $setting = Setting::fetch()->first();
    $setting->set_po_no = $setting->set_po_no + 1;
    $setting->save();
    $elements = $request->input('elements', []);
    //dd($elements);
    // Loop through items
    foreach ($elements as $index => $element) {
        if(isset($element['tax'])){
            $tax = Tax::find($element['tax']);
            $type = $element['type'];
            $item_id = $element['id'];
            $width = floatval($element['width']);
            $base = floatval($element['base'] ?? 0);
            $height = floatval($element['height'] ?? 0);
            $qty = floatval($element['qty']);
            $rate = floatval($element['rate']);
    
            $density = 7.85; // g/cm³ for steel
            $weight = 0;
            $size = "";
    
            if ($type === 'Round') {
                $diameter_cm = $width / 10;
                $length_cm = $height / 10;
                $weight = (M_PI * pow($diameter_cm, 2) * $length_cm * $density) / 4; // grams
                $desc = $width ." * ".$height." = ".$weight;
                $size = $width ." * ".$height;
            } else {
                $weight = ($width * $base * $height * $density) / 1000; // grams
                $desc = $width ." * ".$base." * ".$height." = ".$weight;
                $size = $width ." * ".$base." * ".$height;
            }
    
            $amount = $qty * $rate;
            $tax = $amount * $tax->tax_percent/100;
            $poItem = new POItem();
            $poItem->poi_po_id = $po->po_id;
            $poItem->poi_item_id = $item_id;
            $poItem->poi_qty = $qty;
            $poItem->poi_size = $size;
            $poItem->poi_weight = $weight;
            $poItem->poi_rate = $rate;
            $poItem->poi_tax = $tax;
            $poItem->poi_desc = $desc;
            $poItem->poi_discount = 0;
            $poItem->poi_status = "ok";
            $poItem->save();
    
            $item_mast = Item::find($item_id);
            $item_mast->item_tax_id = $element['tax'];
            $item_mast->save();
        }
    }

    return redirect()->route('po')->with('success', 'PO created successfully');
    }
}
