<?php

namespace App\Http\Controllers;

use App\Models\DcIr;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DcIrController extends Controller
{
    function index(Request $request){
        $dcs = DcIr::fetch()->get();
        return view('pages.dcir.list',compact('dcs'));
    }
    function add(Request $request){
        $parties = Party::fetch()->get();
        return view('pages.dcir.add',compact('parties'));
    }
    function addPost(Request $request){
        $dc = new DcIr();
        $dc->dcir_comp_id = Auth::user()->emp_comp_id;
        $dc->dcir_emp_id = Auth::user()->emp_id;
        $dc->dcir_party_id = $request->dcir_party_id;
        $dc->dcir_date = $request->dcir_date;
        $dc->dcir_number = $request->dcir_number;
        $dc->dcir_remark = $request->dcir_remark;
        $dc->dcir_status = "ok";
        $dc->save();
        return redirect()->route('dcirItemAdd',$dc->dcir_id)->with('success','Added Successfully');
    }
    function edit(Request $request,$id){
        $parties = Party::fetch()->get();
        $dc = DcIr::find($id);
        return view('pages.dcir.edit',compact('parties','dc'));
    }
    function view(Request $request,$id){
        $dc = DcIr::find($id);
        return view('pages.dcir.view',compact('dc'));
    }
    function editPost(Request $request,$id){
        $dc = DcIr::find($id);
        $dc->dcir_party_id = $request->dcir_party_id;
        $dc->dcir_date = $request->dcir_date;
        $dc->dcir_number = $request->dcir_number;
        $dc->dcir_remark = $request->dcir_remark;
        $dc->save();
        return redirect()->route('dcir')->with('success','Updated Successfully');

    }
    function delete(Request $request,$id){
        $dc = DcIr::find($id);
        $dc->dcir_status = "deleted";
        $dc->save();
        return route('dcir')->with('success','Deleted Successfully');
    }
}
