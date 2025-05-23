<?php

namespace App\Http\Controllers;

use App\Models\DcIrItem;
use App\Models\DcOnr;
use App\Models\DcOnrItem;
use App\Models\Item;
use Illuminate\Http\Request;

class DcOnrItemController extends Controller
{
    function index(Request $request,$id){
        $dc = DcOnr::find($id);
        $items = DcOnrItem::fetch($id)->get();
        return view('pages.dconr-item.list',compact('items','dc'));
    }
    function add(Request $request,$id){
        $dc = DcOnr::find($id);
        $items = Item::fetch()->get();
        return view('pages.dconr-item.add',compact('dc','items'));
    }
    function addPost(Request $request,$id){
        $dci = new DcOnrItem();
        $dci->dconri_dconr_id = $id;
        $dci->dconri_item_id = $request->dconri_item_id;
        $dci->dconri_qty = $request->dconri_qty;
        $dci->dconri_remark = $request->dconri_remark;
        $dci->dconri_balance = $request->dconri_qty;
        $dci->dconri_status = "ok";
        $dci->save();
        return redirect()->route('dconrItem',$id)->with("success","Added Successfully");
    }
    function edit(Request $request,$pid,$id){
        $dci = DcOnrItem::find($id);
        $items = Item::fetch()->get();
        return view('pages.dconr-item.edit',compact('dci','items'));
    }
    function editPost(Request $request,$pid,$id){
        $dci = DcOnrItem::find($id);
        $dci->dconri_item_id = $request->dconri_item_id;
        $dci->dconri_qty = $request->dconri_qty;
        $dci->dconri_remark = $request->dconri_remark;
        $dci->save();
        return redirect()->route('dconrItem',$pid)->with("success","Updated Successfully");
    }
    function delete(Request $request,$pid,$id){
        $dci = DcOnrItem::find($id);
        $dci->dconri_status = "deleted";
        $dci->save();
        return redirect()->route('dconrItem',$pid)->with("success","Deleted Successfully");
    }
}
