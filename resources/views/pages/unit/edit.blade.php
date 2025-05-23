@extends('layouts.default')
@section('title')
    Edit Unit
@endsection
@section('content')
<form action="{{ route('unitEditPost',$unit->unit_id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{$unit->unit_name}}" class="form-control" id="name" name="name" required>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Update Unit</button>
            <a href="{{ route('unit') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection