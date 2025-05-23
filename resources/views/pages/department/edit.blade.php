@extends('layouts.default')
@section('title')
    Edit Department
@endsection
@section('content')
<form action="{{ route('departmentEditPost',['id'=>$dept->dept_id]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="name" class="form-label">Department Name</label>
                <input type="text" class="form-control" value="{{$dept->dept_name}}" id="name" name="name" required>
            </div>
            
            <button type="submit" class="btn btn-primary ">Update Department</button>
            <a href="{{ route('department') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection