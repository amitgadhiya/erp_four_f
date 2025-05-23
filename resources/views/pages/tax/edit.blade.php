@extends('layouts.default')
@section('title')
    Edit Tax
@endsection
@section('content')
<form action="{{ route('taxEditPost',$tax->tax_id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" value="{{$tax->tax_name}}" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="percent" class="form-label">Percent</label>
                <input type="number" value="{{$tax->tax_percent}}" class="form-control" id="percent" name="percent" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Update Tax</button>
            <a href="{{ route('tax') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection