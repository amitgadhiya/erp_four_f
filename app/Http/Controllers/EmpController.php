<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Emp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmpController extends Controller
{
    function index(Request $request){
        $emps = Emp::fetch()->get();
        return view('pages.emp.list',compact(['emps']));
    }
    function add(Request $request){
        $depts = Department::fetch()->get();
        return view('pages.emp.add',compact(['depts']));
    }
    function addPost(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'dept' => 'required|exists:depts,dept_id',
            'password' => 'nullable|string|min:6'
        ]);
        $emp = new Emp();
        $emp->emp_comp_id = Auth::user()->company->comp_id;
        $emp->emp_dept_id = $request->dept;
        $emp->emp_name = $request->name;
        $emp->emp_code = $request->code;
        $emp->emp_mobile = $request->mobile;
        $emp->emp_email = $request->email;
        $emp->emp_login_allowed = $request->has('loginAllowed') ? "yes" : "no";
        $emp->emp_created_by = Auth::user()->emp_id;
        if ($request->has('password')) {
            $emp->emp_password = Hash::make($request->password);
        }
        $emp->emp_status = "ok";
        $emp->emp_created_by = Auth::user()->emp_id;
        $emp->emp_updated_by = Auth::user()->emp_id;
        $emp->save();
        return back()->with('success','Saved successfully');
    }
    function edit(Request $request,$id){
        
        $emp = Emp::fetch()->find($id);
        $depts = Department::fetch()->get();
        return view('pages.emp.edit',compact(['emp','depts']));
    }
    function editPost(Request $request,$id){
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'mobile' => 'required|string|max:15',
            'dept' => 'required|exists:depts,dept_id',
            'password' => 'nullable|string|min:6'
        ]);
        $emp = Emp::find($id);
        $emp->emp_dept_id = $request->dept;
        $emp->emp_name = $request->name;
        $emp->emp_code = $request->code;
        $emp->emp_mobile = $request->mobile;
        $emp->emp_email = $request->email;
        $emp->emp_login_allowed = $request->has('loginAllowed') ? "yes" : "no";
        $emp->emp_created_by = Auth::user()->emp_id;
        if ($request->has('password')) {
            $emp->emp_password = Hash::make($request->password);
        }
        $emp->emp_updated_by = Auth::user()->emp_id;
        $emp->save();
        return back()->with('success','Saved successfully');
    }
    function delete(Request $request){
        $emp = Emp::find($request->id);
        $emp->emp_status = "deleted";
        $emp->emp_updated_by = Auth::user()->emp_id;
        $emp->save();
        return back()->with('success','Deleted successfully');
    }
}
