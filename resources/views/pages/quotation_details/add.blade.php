@extends('layouts.default')
@section('title')
    Add Enquiry
@endsection
@section('content')
<form action="{{ route('enquiryAddPost') }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="gst" class="form-label">Enquiry No</label>
                <input type="text" class="form-control" id="enqno" value="{{$enq_number}}" name="enqno" readonly required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Date</label>
                <input type="date" class="form-control" value="" id="date" name="date" required >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <select class="form-select" name="client" id="client" required>
                    <option value="">Select</option>
                    @foreach ($clients as $client)
                    <option value="{{$client->client_id}}">{{$client->client_name}}</option>
                    @endforeach
                    
                </select>
                
            </div>
            
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select class="form-select" id="priority" name="priority" required>
                  <option value="" disabled selected>Select priority</option>
                  <option value="Hot">Hot</option>
                  <option value="Warm">Warm</option>
                  <option value="Cold">Cold</option>
                </select>
            </div>
            
            
        </div>
        <div class="col-lg-3">
            
            <div class="mb-3"> 
                <label for="email" class="form-label">Inquiry Details</label>
                <textarea name="details" id="details" cols="30" class="form-control" rows="6"></textarea>
                
            </div>
            <div class="mb-3"> 
                <label for="email" class="form-label">Remark</label>
                <textarea name="remark" id="remark" cols="30" class="form-control" rows="6"></textarea>
                
            </div>
            
            
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-lg-12"><hr></div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-5">
                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="mb-3">
                        <label for="name" class="form-label">Quantity </label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                </div>
                
                <div class="col-lg-1 d-flex justify-content-center align-items-center" >
                    <a href="#">Add</a>
                </div>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <td>SR.</td>
                    <td>Item</td>
                    <td>Qty</td>
                    <td></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Item</td>
                    <td>1</td>
                    
                    <td><a href="#">Edit</a><br><a href="#">Del</a></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Item</td>
                    <td>1</td>
                    
                    <td><a href="#">Edit</a><br><a href="#">Del</a></td>
                </tr>
            </table>
        </div>
    </div> --}}
    <div class="row mt-3">
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary">Add Enquiry</button>
            <a href="{{ route('enquiry') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')
<script>
    window.onload = () => document.getElementById('date').value = new Date().toISOString().split('T')[0];
    </script>
@endsection