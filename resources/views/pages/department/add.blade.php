@extends('layouts.default')
@section('title')
    Add Department
@endsection
@section('content')
<form action="{{ route('departmentAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Department Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Department</button>
            <a href="{{ route('department') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection