@extends('layouts.default')
@section('title')
    Add unit
@endsection
@section('content')
<form action="{{ route('unitAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Unit Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Add unit</button>
            <a href="{{ route('unit') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection