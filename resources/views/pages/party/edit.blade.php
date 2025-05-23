@extends('layouts.default')
@section('title')
    Edit Party
@endsection
@section('content')
<form onsubmit="return validate()" action="{{ route('partyEditPost',$party->party_id) }}" method="POST">
    @csrf 
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$party->party_name}}" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Shot Name</label>
                <input type="text" class="form-control" id="shotname" value="{{$party->party_shot_name}}" name="shotname" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="{{$party->party_email}}" name="email" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Mobile</label>
                <input type="text" class="form-control" id="mobile" value="{{$party->party_mobile}}" name="mobile" required>
            </div>
        </div>
        <div class="col-lg-4">
            
            
            <div class="mb-3">
                <label class="form-label">Vender Code</label>
                <input type="text" class="form-control" id="vender_code" value="{{$party->party_code}}" name="vender_code" >
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10">{{$party->party_address}}</textarea>
            </div>
            <div class="mb-3">
                <label for="gst" class="form-label">GST Number</label>
                <input type="text" class="form-control" value="{{$party->party_gst}}" id="gst" name="gst" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label d-block">Type </label>
            
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="type[]" value="vendor" id="typeVendor" {{$party->party_vender ? "checked" : "" }}>
                    <label class="form-check-label" for="typeVendor">Vendor</label>
                </div>
            
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="type[]" value="client" id="typeClient" {{$party->party_client ? "checked" : "" }}>
                    <label class="form-check-label" for="typeClient">Client</label>
                </div>
            
                
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">Edit party</button>
            <a href="{{ route('party') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')
<script>
    function validate(){
        const checkboxes = document.querySelectorAll('input[name="type[]"]');
        const isChecked = Array.from(checkboxes).some(cb => cb.checked);
    
        if (!isChecked) {
            alert("Please select at least one type (Vendor or Client).");
            return false; // prevent form submission
        }
    
        return true; // allow form submission
    }
    </script>
@endsection