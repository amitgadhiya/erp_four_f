@extends('layouts.default')
@section('title')
    Add Party
@endsection
@section('content')
<form onsubmit="return validate()" action="{{ route('partyAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Shot Name</label>
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
                <label class="form-label">Vender Code</label>
                <input type="text" class="form-control" id="vender_code" name="vender_code" >
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" id="address" cols="30" rows="10"></textarea>
            </div>
            <div class="mb-3">
                <label for="gst" class="form-label">GST Number</label>
                <input type="text" class="form-control" id="gst" name="gst" required>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label class="form-label d-block">Type <span class="text-danger">*</span></label>
            
                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" name="type[]" value="vendor" id="typeVendor">
                    <label class="form-check-label" for="typeVendor">Vendor</label>
                </div>
            
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="type[]" value="client" id="typeClient">
                    <label class="form-check-label" for="typeClient">Client</label>
                </div>
            
                
            </div>
            
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <button type="submit" class="btn btn-primary">Add Party</button>
            <a href="{{ route('party') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>
<script>
    
</script>
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