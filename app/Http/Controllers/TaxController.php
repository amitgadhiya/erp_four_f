<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaxController extends Controller
{
    function index(Request $request){
        $taxs = Tax::fetch()->get();
        return view('pages.tax.list',compact(['taxs']));
    }
    function add(Request $request){
        return view('pages.tax.add');
    }
    function addPost(Request $request){
        $tax = new Tax();
        $tax->tax_comp_id = Auth::user()->company->comp_id;
        $tax->tax_name = $request->name;
        $tax->tax_percent = $request->percent;
        $tax->tax_created_by = Auth::user()->emp_id;
        $tax->tax_updated_by = Auth::user()->emp_id;
        $tax->tax_status = "ok";
        $tax->save();
        return back()->with("success","Saved Successfully");
    }
    function edit(Request $request,$id){
        $tax = Tax::fetch()->find($id);
        return view('pages.tax.edit',compact(['tax']));
    }
    function editPost(Request $request,$id){
        $tax = Tax::find($id);
        $tax->tax_name = $request->name;
        $tax->tax_percent = $request->percent;
        $tax->tax_updated_by = Auth::user()->emp_id;
        $tax->save();
        return back()->with("success","Saved Successfully");
    }
    function delete(Request $request){
        $tax = Tax::find($request->id);
        $tax->tax_updated_by = Auth::user()->emp_id;
        $tax->tax_status = "deleted";
        $tax->save();
        return back()->with("success","Deleted Successfully");
    }
}
