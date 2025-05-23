@extends('layouts.default')
@section('title')
    Issue Item by Project
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="recipient">To Department Name</label>
                        <select required name="dept" id="dept" class="form-control">
                            <option value="">Select</option>
                            @foreach ($depts as $dept)
                            <option value="{{$dept->dept_id}}">{{$dept->dept_name}}</option>
                            @endforeach
                            
                        </select>
                    </div>
        
                    <!-- Recipient Name -->
                    <div class="form-group">
                        <label for="recipient">Recipient Name</label>
                        <select required name="emp" id="emp" class="form-control">
                            <option value="">Select</option>
                            @foreach ($emps as $emp)
                            <option value="{{$emp->emp_id}}">{{$emp->emp_name}} </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <!-- Remarks -->
                    <div class="form-group">
                        <label for="remarks">Remarks</label>
                        <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter remarks (optional)"></textarea>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
