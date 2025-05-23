@extends('layouts.default')
@section('title')
    Edit Work Category
@endsection
@section('content')
<form action="{{ route('workCatgEditPost', $workcatg->wc_id) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Work Name</label>
                <input type="text" class="form-control" id="wc_name" name="wc_name" required value="{{ $wc->wc_name }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Category</label>
                <select class="form-select" required name="wc_type" id="wc_type">
                    <option value="{{ $wc->wc_type }}">{{ $wc->wc_type }}</option>
                    <option value="design">design</option>
                    <option value="production">production</option>
                    <option value="assembly">assembly</option>
                </select>
            </div>
            
            
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('workCatg') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection