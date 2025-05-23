<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\PO;
use App\Models\POItem;
use Illuminate\Http\Request;

class POItemController extends Controller
{
    function index(Request $request,$id){
        $po = PO::find($id);
        $poitems = POItem::fetch($id)->get();
        
        return view('pages.po_item.list',compact('po','poitems'));
    }
    function add(Request $request,$id){
        $items = Item::fetch()->get();
        return view('pages.po_item.add',compact('items'));
    }
    function addPost(Request $request,$id){
        $poitem = new POItem();
        $poitem->poi_po_id = $id;
        $poitem->poi_item_id = $request->item;
        $poitem->poi_qty = $request->quantity;
        $poitem->poi_rate = $request->rate;
        $poitem->poi_desc = $request->desc;
        $poitem->poi_discount = 0;
        $poitem->poi_tax = 0;
        $poitem->poi_status = "ok";
        $poitem->save();
        return redirect()->route('poItem',$id)->with('success','Added successfully');
    }
    function edit(Request $request,$pid,$id){
        $items = Item::fetch()->get();
        $poitem = POItem::find($id);
        return view('pages.po_item.edit',compact('items','poitem'));

    }
    function editPost(Request $request,$pid,$id){
        $poitem = POItem::find($id);
        
        $poitem->poi_item_id = $request->item;
        $poitem->poi_qty = $request->quantity;
        $poitem->poi_rate = $request->rate;
        $poitem->poi_desc = $request->desc;
        $poitem->poi_discount = 0;
        $poitem->poi_tax = 0;
        $poitem->save();
        return redirect()->route('poItem',$pid)->with('success','Updated successfully');
    }
    function delete(Request $request,$pid,$id){
        $poitem = POItem::find($id);
        $poitem->poi_status = "deleted";
        $poitem->save();
        return redirect()->route('poItem',$pid)->with('success','Deleted successfully');
    }

}
