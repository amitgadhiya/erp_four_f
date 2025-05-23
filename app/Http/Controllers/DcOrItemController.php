<?php

namespace App\Http\Controllers;

use App\Models\DcOr;
use App\Models\DcOrItem;
use App\Models\Item;
use Illuminate\Http\Request;

class DcOrItemController extends Controller
{
    function index(Request $request,$id){
        $dc = DcOr::find($id);
        $items = DcOrItem::fetch($id)->get();
        return view('pages.dcor-item.list',compact('items','dc'));
    }
    function add(Request $request,$id){
        $dc = DcOr::find($id);
        $items = Item::fetch()->get();
        return view('pages.dcor-item.add',compact('dc','items'));
    }
    function addPost(Request $request,$id){
        $dci = new DcOrItem();
        $dci->dcori_dcor_id = $id;
        $dci->dcori_item_id = $request->dcori_item_id;
        $dci->dcori_qty = $request->dcori_qty;
        $dci->dcori_remark = $request->dcori_remark;
        $dci->dcori_balance = $request->dcori_qty;
        $dci->dcori_status = "ok";
        $dci->save();
        return redirect()->route('dcorItem',$id)->with("success","Added Successfully");
    }
    function edit(Request $request,$id){
        $dci = DcOrItem::find($id);
        $items = Item::fetch()->get();
        return view('pages.dcor-item.edit',compact('dci','items'));
    }
    function editPost(Request $request,$pid,$id){
        $dci = DcOrItem::find($id);
        $dci->dcori_item_id = $request->dcori_item_id;
        $dci->dcori_qty = $request->dcori_qty;
        $dci->dcori_remark = $request->dcori_remark;
        $dci->save();
        return redirect()->route('dcorItem',$pid)->with("success","Updated Successfully");
    }
    function delete(Request $request,$pid,$id){
        $dci = DcOrItem::find($id);
        $dci->dcori_status = "deleted";
        $dci->save();
        return redirect()->route('dcorItem',$pid)->with("success","Deleted Successfully");
    }
}
