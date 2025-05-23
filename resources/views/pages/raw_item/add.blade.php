@extends('layouts.default')
@section('title')
    Add Raw Item
@endsection
@section('content')
<form action="{{ route('raw_item.add.post') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-lg-3">
       
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Item Code</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Item Category</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Opning stock</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Min stock alert</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Raw Item</button>
            <a href="{{ route('raw_item.list') }}" class="btn btn-secondary">Cancel</a>
        
    </div>
</div>
</form>
@endsection
@section('script')

@endsection