<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use App\Models\EnquiryD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnquiryDController extends Controller
{
    function index(Request $request,$id){
        $enq = Enquiry::fetch()->find($id);
        $enqds = EnquiryD::where("enqd_enq_id",$id)->get();
        return view('pages.enquiry_details.list',compact(['enq','enqds'])); 
    }
    function addPost(Request $request,$id){
        $enqd = new EnquiryD();
        $enqd->enqd_enq_id = $id;
        $enqd->enqd_product = $request->product;
        $enqd->enqd_qunt = $request->quantity;
        $enqd->save();
        return redirect()->route('enqdetails',['id' => $id])->with('success', 'Saved Successfully');
    }
    function edit(Request $request,$pid,$id){
        $enq = Enquiry::fetch()->find($pid);
        $enqd = EnquiryD::where("enqd_id",$id)->first();
        //dd($enqd);
        return view('pages.enquiry_details.edit',compact(['enq','enqd']));
    }
    function editPost(Request $request,$id,$pid){
        $enqd = EnquiryD::find($id);
        $enqd->enqd_product = $request->product;
        $enqd->enqd_qunt = $request->quantity;
        $enqd->save();
        return redirect()->route('enqdetails',['id' => $pid])->with('success', 'Saved Successfully');
    }
    function delete(Request $request){
        $enqd = EnquiryD::find($request->id);
        $enqd->delete();
        return back()->with("success","Deleted Successfully");
    }
}
