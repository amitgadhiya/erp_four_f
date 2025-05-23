<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Enquiry;
use App\Models\Party;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnquiryController extends Controller
{
    function index(Request $request){
        $enqs = Enquiry::fetch()->get();
        
        return view('pages.enquiry.list',compact(['enqs']));
    }
    function add(Request $request){
        $setting = Setting::fetch()->first();
        $parties = Party::fetch_client()->get();
        $enq_number = $setting->set_enq_pre.date("y")."-".sprintf('%04d', $setting->set_enq_no+1);
        return view('pages.enquiry.add',compact('enq_number','parties'));
    }
    function addPost(Request $request){
        
        $enq = new Enquiry();
        $enq->enq_comp_id = Auth::user()->company->comp_id;
        $enq->enq_party_id = $request->client;
        $enq->enq_number = $request->enqno;
        $enq->enq_date = $request->date;
        $enq->enq_priority = $request->priority;
        $enq->enq_input = $request->enq_input;
        $enq->enq_cons_work = $request->enq_cons_work;
        $enq->enq_cons_app = $request->enq_cons_app;
        $enq->enq_work_status = $request->enq_work_status;
        $enq->enq_details = $request->details;
        $enq->enq_remark = $request->remark;
        $enq->enq_emp_id = Auth::user()->emp_id;
        $enq->enq_created_by = Auth::user()->emp_id;
        $enq->enq_updated_by = Auth::user()->emp_id;
        $enq->enq_status = "ok";
        $enq->save();
        $setting = Setting::fetch()->first();
        $setting->set_enq_no = $setting->set_enq_no+1;
        $setting->save();
        return redirect()->route('enqdetails',['id' => $enq->enq_id])->with('success', 'Saved Successfully');
        //return back()->with("success","Saved Successfully");
    }
    function edit(Request $request,$id){
        $enq = Enquiry::fetch()->find($id);
        $parties = Party::fetch_client()->get();
        return view('pages.enquiry.edit',compact(['enq','parties']));
    }
    function editPost(Request $request,$id){
        $enq = Enquiry::fetch()->find($id);
        $enq->enq_party_id = $request->client;
        $enq->enq_date = $request->date;
        $enq->enq_priority = $request->priority;
        $enq->enq_input = $request->enq_input;
        $enq->enq_cons_work = $request->enq_cons_work;
        $enq->enq_cons_app = $request->enq_cons_app;
        $enq->enq_work_status = $request->enq_work_status;
        $enq->enq_details = $request->details;
        $enq->enq_remark = $request->remark;
        $enq->enq_updated_by = Auth::user()->emp_id;
        $enq->save();
        return redirect()->route('enquiry')->with("success","Saved Successfully");
    }
    function delete(Request $request){
        $tax = Enquiry::find($request->id);
        $tax->tax_updated_by = Auth::user()->emp_id;
        $tax->tax_status = "deleted";
        $tax->save();
        return back()->with("success","Deleted Successfully");
    }
}
