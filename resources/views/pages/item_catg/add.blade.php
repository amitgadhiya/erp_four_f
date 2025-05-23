@extends('layouts.default')
@section('title')
    Add Item Category
@endsection
@section('content')
<form action="{{ route('icAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label"> Name</label>
                <input type="text" class="form-control" id="ic_name" name="ic_name" required>
            </div>
            
            <div class="mb-3">
                <label for="gst" class="form-label">Shot name</label>
                <input type="text" class="form-control" id="ic_shot" name="ic_shot" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Item category</button>
            <a href="{{ route('ic') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection