@extends('layouts.default')
@section('title')
    Edit Design Work Log
@endsection
@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <form onsubmit="return validateTimeRange();" action="{{ route('designWorkEditPost',['id'=>$dw->dw_id]) }}" method="Post">
                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{\Carbon\Carbon::parse($dw->dw_start_time)->format('Y-m-d')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">Project Number</label>
                            <select class="form-select" id="project" name="project" required>
                                
                                
                                <option value="@if ($dw->project)
                                    {{$dw->project->pro_id}}
                                @else
                                    {{$dw->enq->enq_id}}
                                @endif" >
                                    @if ($dw->project)
                                        {{$dw->project->pro_number}}
                                    @else
                                        {{$dw->enq->enq_number}}
                                    @endif
                                
                                </option>
                                <optgroup label="Enquiries">
                                    @foreach ($enquiries as $enquiry)
                                    <option value="E-{{$enquiry->enq_id}}">{{$enquiry->enq_number}}</option>
                                    @endforeach
                                   </optgroup>
                                   <optgroup label="Projects">
                                    @foreach ($projects as $project)
                                    <option value="P-{{$project->pro_id}}">{{$project->pro_number}}</option>
                                    @endforeach
                                </optgroup>
                                
                                
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="work_category" class="form-label">Work Category</label>
                            <select class="form-select" id="work_category" name="work_category" required>
                                <option value="{{$dw->catg->wc_id}}" >{{$dw->catg->wc_name}}</option>
                                @foreach ($wcs as $wc)
                                <option value="{{$wc->wc_id}}">{{$wc->wc_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="work_desc" class="form-label">Work Description</label>
                            <textarea class="form-control" id="work_desc" name="work_desc" rows="3" placeholder="Enter work description" required>{{$dw->dw_desc}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" value="{{\Carbon\Carbon::parse($dw->dw_start_time)->format('H:m')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" value="{{\Carbon\Carbon::parse($dw->dw_end_time)->format('H:m')}}" required>
                        </div>
                      
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Save Work Log</button>
                <a href="{{ route('designWork') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    function validateTimeRange() {
    const start = document.getElementById('start_time').value;
    const end = document.getElementById('end_time').value;

    if (start && end) {
        const startDate = new Date(`1970-01-01T${start}`);
        const endDate = new Date(`1970-01-01T${end}`);

        if (startDate >= endDate) {
            alert('Start time must be less than End time.');
            return false; // prevent form submission
        }
    }

    return true; // allow form submission
}
</script>
@endsection
