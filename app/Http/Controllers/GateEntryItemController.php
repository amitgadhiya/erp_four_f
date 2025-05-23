<?php

namespace App\Http\Controllers;

use App\Models\GateEntry;
use App\Models\GateEntryItem;
use App\Models\Item;
use App\Models\Tax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GateEntryItemController extends Controller
{
    function index(Request $request, $id){
        $ge = GateEntry::find($id);
        $geis = GateEntryItem::where('gei_ge_id',$ge->ge_id)->get();
        return view('pages.gate_entry_item.list',compact('ge','geis'));
    }
    function add(Request $request, $id){
        $items = Item::fetch()->get();
        $taxes = Tax::fetch()->get();
        return view('pages.gate_entry_item.add',compact('items','taxes'));
    }
    function addPost(Request $request, $id){
        $gei = new GateEntryItem();
        $gei->gei_ge_id = $id;
        $gei->gei_item_id = $request->gei_item_id;
        $gei->gei_qty = $request->gei_qty;
        $gei->gei_rate = $request->gei_rate;
        $gei->gei_tax_id = $request->gei_tax_id;
        $gei->save();
        return redirect()->back()->with('success','Added successfully');
    }
    function edit(Request $request,$pid, $id){
        $items = Item::fetch()->get();
        $gei = GateEntryItem::find($id);
        $taxes = Tax::fetch()->get();
        return view('pages.gate_entry_item.edit',compact('items','gei','taxes'));
    }
    function editPost(Request $request,$pid, $id){
        $gei =  GateEntryItem::find($id);
        $gei->gei_item_id = $request->gei_item_id;
        $gei->gei_qty = $request->gei_qty;
        $gei->gei_rate = $request->gei_rate;
        $gei->gei_tax_id = $request->gei_tax_id;
        $gei->save();
        return redirect()->route('gateEntryItem',['id'=>$pid])->with('success','Updated successfully');
    }
    function delete(Request $request,$pid, $id){
        
    }
}
