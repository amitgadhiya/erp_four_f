<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{
    function index(Request $request){
        $depts = Department::fetch()->get();
        return view('pages.department.list',compact(['depts']));
    }
    function add(Request $request){
        return view('pages.department.add');
    }
    function addPost(Request $request){
        $dept = new Department();
        $dept->dept_name = $request->name;
        $dept->dept_comp_id = Auth::user()->company->comp_id;
        $dept->dept_created_by = Auth::user()->emp_id;
        $dept->dept_updated_by = Auth::user()->emp_id;
        $dept->dept_status = 'ok';
        $dept->save();
        return back()->with(['success'=>'Saved successfully']);
    }
    function edit(Request $request,$id){
        $dept = Department::fetch()->find($id);
        return view('pages.department.edit',compact(['dept']));
    }
    function editPost(Request $request,$id){
        $dept = Department::find($id);
        $dept->dept_name = $request->name;
        $dept->dept_updated_by = Auth::user()->emp_id;
        $dept->save();
        return back()->with(['success'=>'Saved successfully']);
    }
    function delete(Request $request,$id){
        $dept = Department::find($id);
        $dept->dept_status = 'deleted';
        $dept->save();
        return back()->with(['success'=>'Deleted successfully']);
    }
}
