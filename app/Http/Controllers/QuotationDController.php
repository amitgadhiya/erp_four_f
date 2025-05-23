<?php

namespace App\Http\Controllers;

use App\Models\Quotation;
use App\Models\QuotationD;
use App\Models\Tax;
use Illuminate\Http\Request;

class QuotationDController extends Controller
{
    function index(Request $request,$id){
        $quotation_details = QuotationD::where("qd_qout_id",$id)->get();
        $taxs = Tax::fetch()->get();
        $quotation = Quotation::fetch()->find($id);
        return view('pages.quotation_details.list',compact(['quotation_details','quotation','taxs']));
    }
    function add(Request $request){
        //return view('pages.quotation_details.add');
    }
    function addPost(Request $request,$id){
        
        $quotationDetails = QuotationD::where("qd_qout_id",$id)->get();

        // Create new machine instance
        $quotation_details = new QuotationD();
        $quotation_details->qd_qout_id = $id;
        $quotation_details->qd_tax_id = $request->tax;
        $quotation_details->qd_sr = $quotationDetails->count()+1;
        $quotation_details->qd_name = $request->product;
        $quotation_details->qd_rate = $request->rate;
        $quotation_details->qd_qty = $request->quantity;
        $quotation_details->qd_discount = 0;
        
        
        $quotation_details->save(); // Save to database

        return redirect()->route('quotationdetail',['id'=>$id])->with('success', 'Added successfully!');
    }
    function edit(Request $request,$pid,$id ){
        $taxs = Tax::fetch()->get();
        $quotation_details = QuotationD::find($id);
        $quotation = Quotation::find($pid);
        return view('pages.quotation_details.edit',compact(['quotation_details','quotation','taxs']));
    }
    function editPost(Request $request,$pid,$id){
        

        // Find the machine by ID
        $qd = QuotationD::findOrFail($id);

        // Update machine details
        $qd->qd_tax_id = $request->tax;
        $qd->qd_sr = $request->sr;
        $qd->qd_name = $request->product;
        $qd->qd_rate = $request->rate;
        $qd->qd_qty = $request->quantity;
        $qd->qd_discount = 0;

        $qd->save(); // Save changes

        return redirect()->route('quotationdetail',$pid)->with('success', 'Updated successfully!');
    }
    function delete(Request $request,$pid,$id){
        $quotation_details = QuotationD::findOrFail($id);
        $quotation_details->delete(); 
        return redirect()->back()->with('success', 'Deleted successfully!');
    }
}
