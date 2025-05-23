@extends('layouts.default',['__menu' => 'master','__menu_sub' => 'vender'])
@section('title')
    Add Vender
@endsection
@section('content')
<form action="{{ route('venderAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="name" class="form-label">Vender Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Vender Shot Name</label>
                <input type="text" class="form-control" id="shotname" name="shotname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" name="mobile" required>
            </div>
        </div>
        <div class="col-lg-4">
            
            <div class="mb-3">
                <label class="form-label">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Vender Code</label>
                <input type="text" class="form-control" id="vender_code" name="vender_code" >
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="gst" class="form-label">GST Number</label>
                <input type="text" class="form-control" id="gst" name="gst" required>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">Add Vender</button>
            <a href="{{ route('vender') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection