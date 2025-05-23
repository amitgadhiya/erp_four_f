<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MachineController extends Controller
{
    function index(Request $request){
        $machines = Machine::fetch()->get();
        return view('pages.machine.list',compact(['machines']));
    }
    function add(Request $request){
        return view('pages.machine.add');
    }
    function addPost(Request $request){
        $request->validate([
            'mach_name' => 'required|string|max:255',
            'mach_no' => 'required|string|max:255',
            'mach_make' => 'required|string|max:255',
            'mach_model' => 'required|string|max:255',
            'mach_spec' => 'nullable|string',
            'mach_install_date' => 'required|date',
            'mach_setting' => 'nullable|file|mimes:pdf,doc,docx,zip,rar|max:2048',
            'mach_warranty' => 'nullable|file|mimes:pdf,jpg,png,zip,rar|max:2048',
            'mach_invoice' => 'nullable|file|mimes:pdf,jpg,png,zip,rar|max:2048',
        ]);
        // File uploads
        $mach_setting = $request->file('mach_setting') ? $request->file('mach_setting')->store('machine_files','public') : null;
        $mach_warranty = $request->file('mach_warranty') ? $request->file('mach_warranty')->store('machine_files','public') : null;
        $mach_invoice = $request->file('mach_invoice') ? $request->file('mach_invoice')->store('machine_files','public') : null;

        // Create new machine instance
        $machine = new Machine();
        $machine->mach_comp_id = Auth::user()->emp_comp_id;
        $machine->mach_name = $request->mach_name;
        $machine->mach_no = $request->mach_no;
        $machine->mach_make = $request->mach_make;
        $machine->mach_model = $request->mach_model;
        $machine->mach_spec = $request->mach_spec;
        $machine->mach_install_date = $request->mach_install_date;
        $machine->mach_setting = $mach_setting;
        $machine->mach_warranty = $mach_warranty;
        $machine->mach_invoice = $mach_invoice;
        $machine->mach_status = "ok";
        $machine->mach_created_by = Auth::user()->emp_id;
        $machine->mach_updated_by = Auth::user()->emp_id;
        
        $machine->save(); // Save to database

        return redirect()->route('machine')->with('success', 'Machine added successfully!');
    }
    function edit(Request $request,$id){
        $machine = Machine::fetch()->find($id);
        return view('pages.machine.edit',compact(['machine']));
    }
    function editPost(Request $request,$id){
        $request->validate([
            'mach_name' => 'required|string|max:255',
            'mach_no' => 'required|string|max:255',
            'mach_make' => 'required|string|max:255',
            'mach_model' => 'required|string|max:255',
            'mach_spec' => 'nullable|string',
            'mach_install_date' => 'required|date',
            'mach_setting' => 'nullable|file|mimes:pdf,doc,docx,zip,rar|max:2048',
            'mach_warranty' => 'nullable|file|mimes:pdf,jpg,png,zip,rar|max:2048',
            'mach_invoice' => 'nullable|file|mimes:pdf,jpg,png,zip,rar|max:2048',
        ]);

        // Find the machine by ID
        $machine = Machine::findOrFail($id);
        
        // File uploads (only update if new files are uploaded)
        if ($request->hasFile('mach_setting')) {
            $machine->mach_setting = $request->file('mach_setting')->store('machine_files','public');
        }
        if ($request->hasFile('mach_warranty')) {
            $machine->mach_warranty = $request->file('mach_warranty')->store('machine_files','public');
        }
        if ($request->hasFile('mach_invoice')) {
            $machine->mach_invoice = $request->file('mach_invoice')->store('machine_files','public');
        }

        // Update machine details
        $machine->mach_name = $request->mach_name;
        $machine->mach_no = $request->mach_no;
        $machine->mach_make = $request->mach_make;
        $machine->mach_model = $request->mach_model;
        $machine->mach_spec = $request->mach_spec;
        $machine->mach_install_date = $request->mach_install_date;

        $machine->save(); // Save changes

        return redirect()->route('machine')->with('success', 'Machine updated successfully!');
    }
    function delete(Request $request,$id){
        $machine = Machine::findOrFail($id);
        $machine->mach_status = "deleted";
        $machine->save(); 
        return redirect()->back()->with('success', 'Machine deleted successfully!');
    }
}
