@extends('layouts.default')
@section('title')
    Issue Item by Project
@endsection
@section('content')
@if (!isset($depts))
<div class="row mt-3">
    <div class="col-lg-4">
        <form action="{{route('issueSearchPost')}}" method="post" >
            <!-- CSRF Token -->
            @csrf

            
            
            

            
            <div class="form-group">
                <label for="recipient">Project</label>
                <select required name="project" id="project" class="form-control">
                    <option value="">Select</option>
                    @foreach ($projects as $project)
                    <option value="{{$project->pro_id}}">{{$project->pro_number}} </option>
                    @endforeach
                </select>
            </div>
            
            
            <input type="submit" class="btn btn-success" value="Search">
        </form>
    </div>
</div>
@endif
@if (isset($depts))
<hr><hr>
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
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table">
                            <tr>
                                <td>Sr</td>
                                <td>Item</td>
                                <td>Stock</td>
                                <td>Qty Required</td>
                                <td>Qty to issue</td>
                            </tr>
                            @foreach ($elements as $ele)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$ele->item->item_name}}</td>
                                <td>{{$ele->item->item_stock}}</td>
                                <td>{{$ele->ele_qty}}</td>
                                <td><input max="{{$ele->item->item_stock}}" class="form-control" required type="text"></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lg-12">
                        <input class="btn btn-success" type="submit" value="Update">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endif



@endsection
