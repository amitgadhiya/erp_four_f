@extends('layouts.default')
@section('title')
    Add Tax
@endsection
@section('content')
<form action="{{ route('taxAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Tax Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="mb-3">
                <label for="gst" class="form-label">Tax Percent</label>
                <input type="number" class="form-control" id="percent" name="percent" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Tax</button>
            <a href="{{ route('tax') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection