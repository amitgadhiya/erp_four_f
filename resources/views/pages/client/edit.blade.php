@extends('layouts.default',['__menu' => 'master','__menu_sub' => 'client'])
@section('title')
    Edit Client
@endsection
@section('content')
<form action="{{ route('clientEditPost',$client->client_id) }}" method="POST">
    @csrf 
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="name" class="form-label">Client Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$client->client_name}}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Client Shot Name</label>
                <input type="text" class="form-control" id="shotname" value="{{$client->client_shot_name}}" name="shotname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{$client->client_email}}" name="email" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" value="{{$client->client_mobile}}" name="mobile" required>
            </div>
        </div>
        <div class="col-lg-4">
            
            <div class="mb-3">
                <label class="form-label">Contact Person</label>
                <input type="text" class="form-control" value="{{$client->client_contact_person}}" id="contact_person" name="contact_person" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Vender Code</label>
                <input type="text" class="form-control" id="vender_code" value="{{$client->client_vender_code}}" name="vender_code" >
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10">{{$client->client_address}}</textarea>
            </div>
            <div class="mb-3">
                <label for="gst" class="form-label">GST Number</label>
                <input type="text" class="form-control" value="{{$client->client_gst_no}}" id="gst" name="gst" required>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">Edit Client</button>
            <a href="{{ route('client') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection