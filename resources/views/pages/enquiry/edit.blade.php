@extends('layouts.default')
@section('title')
    Edit Enquiry
@endsection
@section('content')

<form action="{{ route('enquiryEditPost',['id'=>$enq->enq_id]) }}" method="Post">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="gst" class="form-label">Enquiry No</label>
                <input type="text" class="form-control" id="enqno" value="{{$enq->enq_number}}" name="enqno" readonly required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Date</label>
                <input type="date" class="form-control" value="{{$enq->enq_date}}" id="date" name="date" required >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Customer Name</label>
                <select class="form-select" name="client" id="client" required>
                    <option value="{{$enq->party->party_id}}">{{$enq->party->party_name}}</option>
                    @foreach ($parties as $party)
                    <option value="{{$party->party_id}}">{{$party->party_name}}</option>
                    @endforeach
                    
                </select>
                
            </div>
            
            <div class="mb-3">
                <label for="priority" class="form-label">Priority</label>
                <select class="form-select" id="priority" name="priority" required>
                  <option value="{{$enq->enq_priority}}">{{$enq->enq_priority}}</option>
                  <option value="Hot">Hot</option>
                  <option value="Warm">Warm</option>
                  <option value="Cold">Cold</option>
                </select>
            </div>
            
            
        </div>
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="priority" class="form-label">Input</label>
                <select class="form-select" id="enq_input" name="enq_input" required>
                  <option value="{{$enq->enq_input}}" >{{$enq->enq_input}}</option>
                  <option value="Pending">Pending</option>
                  <option value="Complete">Complete</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Concept Approval</label>
                <select class="form-select" id="enq_cons_app" name="enq_cons_app" required>
                  <option value="{{$enq->enq_cons_app}}" >{{$enq->enq_cons_app}} </option>
                  <option value="Pending">Pending</option>
                  <option value="Complete">Complete</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Concept Working</label>
                <select class="form-select" id="enq_cons_work" name="enq_cons_work" required>
                  <option value="{{$enq->enq_cons_work}}" >{{$enq->enq_cons_work}} </option>
                  <option value="Pending">Pending</option>
                  <option value="Complete">Complete</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="priority" class="form-label">Status</label>
                <select class="form-select" id="enq_work_status" name="enq_work_status" required>
                  <option value="{{$enq->enq_work_status}}" >{{$enq->enq_work_status}}</option>
                  <option value="Open">Open</option>
                  <option value="Close">Close</option>
                  <option value="Hold">Hold</option>
                  <option value="Cancle">Cancle</option>
                </select>
            </div>
            
            
            
        </div>
        <div class="col-lg-3">
            
            <div class="mb-3"> 
                <label for="email" class="form-label">Inquiry Details</label>
                <textarea name="details" id="details" cols="30" class="form-control" rows="6">{{$enq->enq_details}}</textarea>
                
            </div>
            <div class="mb-3"> 
                <label for="email" class="form-label">Remark</label>
                <textarea name="remark" id="remark" cols="30" class="form-control" rows="6">{{$enq->enq_remark}}</textarea>
                
            </div>
            
            
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary">Update Enquiry</button>
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