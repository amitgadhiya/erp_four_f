@extends('layouts.default')
@section('title')
    Edit Machine
@endsection
@section('content')
<form action="{{ route('machine.edit.post') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Machine Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="gst" class="form-label">GST Number</label>
                <input type="text" class="form-control" id="gst" name="gst" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Machine</button>
            <a href="{{ route('machine.list') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection