<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\EnquiryD;
use App\Models\Quotation;
use App\Models\QuotationD;
use App\Models\Setting;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuotationController extends Controller
{
    function index(Request $request){
        $quotations = Quotation::fetch()->with('nextFollowUp')->get();
        return view('pages.quotation.list',compact(['quotations']));
    }
    function add(Request $request,$id){
        $taxs = Tax::fetch()->get();
        $enq = Enquiry::fetch()->find($id);
        $enqds = EnquiryD::where("enqd_enq_id",$id)->get();
        $setting = Setting::fetch()->first();
        $quotation_no = $setting->set_quot_pre.date('y')."-".sprintf('%04d', $setting->set_quot_no+1);
        return view('pages.quotation.add',compact('enq','quotation_no','enqds','taxs'));
    }
    function addPost(Request $request){
        $enq = Enquiry::fetch()->find($request->enquiry_id);
        $quotation = new Quotation();
        $quotation->quot_number = $request->quotation_no;
        $quotation->quot_party_id = $enq->party->party_id;
        $quotation->quot_enq_id = $request->enquiry_id;
        $quotation->quot_date = $request->date;
        $quotation->quot_remake = $request->quot_remake;
        $quotation->quot_emp_id = Auth::user()->emp_id;
        $quotation->quot_updated_by = Auth::user()->emp_id;
        $quotation->quot_created_by = Auth::user()->emp_id;
        $quotation->quot_comp_id = Auth::user()->emp_comp_id;
        $quotation->quot_status = "ok";
        $quotation->save();
        $setting = Setting::fetch()->first();
        $setting->set_quot_no = $setting->set_quot_no+1;
        $setting->save();

    $items = $request->input('items');
    $qtys = $request->input('qty');
    $rates = $request->input('rate');
    $taxs = $request->input('tax');
    $i=1;
    foreach ($items as $index => $item) {
        $detail = new QuotationD();
        $detail->qd_qout_id = $quotation->quot_id;
        $detail->qd_name = $item;
        $detail->qd_sr = $i;
        $detail->qd_qty = $qtys[$index];
        $detail->qd_rate = $rates[$index];
        $detail->qd_tax_id = $taxs[$index];
        
        $detail->qd_discount = 0;
        $detail->save();
        $i++;
    }

    return redirect()->route('quotation')->with('success', 'Quotation saved successfully.');
    }
    function view(Request $request,$id){
        $quotation = Quotation::fetch()->find($id);
        return view('pages.quotation.view',compact(['quotation']));
    }
    function edit(Request $request,$id){
        $quot = Quotation::fetch()->find($id);
        return view('pages.quotation.edit',compact(['quot']));
    }
    function editPost(Request $request,$id){
        

        // Find the machine by ID
        $quotation = Quotation::findOrFail($id);
        
       
        // Update machine details
        $quotation->quot_date = $request->quot_date;
        $quotation->quot_remake = $request->quot_remake;
        

        $quotation->save(); // Save changes

        return redirect()->route('quotation')->with('success', 'Updated successfully!');
    }
    function delete(Request $request,$id){
        
    }
}
