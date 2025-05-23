<?php

namespace App\Http\Controllers;

use App\Models\DcInr;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DcInrController extends Controller
{
    function index(Request $request){
        $dcs = DcInr::fetch()->get();
        return view('pages.dcinr.list',compact('dcs'));
    }
    function add(Request $request){
        $parties = Party::fetch()->get();
        return view('pages.dcinr.add',compact('parties'));
    }
    function addPost(Request $request){
        $dc = new DcInr();
        $dc->dcinr_comp_id = Auth::user()->emp_comp_id;
        $dc->dcinr_emp_id = Auth::user()->emp_id;
        $dc->dcinr_party_id = $request->dcinr_party_id;
        $dc->dcinr_date = $request->dcinr_date;
        $dc->dcinr_number = $request->dcinr_number;
        $dc->dcinr_remark = $request->dcinr_remark;
        $dc->dcinr_status = "ok";
        $dc->save();
        return redirect()->route('dcinrItemAdd',$dc->dcinr_id)->with('success','Added Successfully');
    }
    function edit(Request $request,$id){
        $parties = Party::fetch()->get();
        $dc = DcInr::find($id);
        return view('pages.dcinr.edit',compact('parties','dc'));
    }
    function view(Request $request,$id){
        $dc = DcInr::find($id);
        return view('pages.dcinr.view',compact('dc'));
    }
    function editPost(Request $request,$id){
        $dc = DcInr::find($id);
        $dc->dcinr_party_id = $request->dcinr_party_id;
        $dc->dcinr_date = $request->dcinr_date;
        $dc->dcinr_number = $request->dcinr_number;
        $dc->dcinr_remark = $request->dcinr_remark;
        $dc->save();
        return redirect()->route('dcinr')->with('success','Updated Successfully');

    }
    function delete(Request $request,$id){
        $dc = DcInr::find($id);
        $dc->dcinr_status = "deleted";
        $dc->save();
        return route('dcinr')->with('success','Deleted Successfully');
    }
}
