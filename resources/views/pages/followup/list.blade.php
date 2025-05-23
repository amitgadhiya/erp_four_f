@extends('layouts.default')
@section('title')
    Follow-Up List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 d-flex ">
        <a href="{{ route('quotation') }}" class="btn btn-link">< Back</a>
    </div>
    <div class="col-lg-6 d-flex justify-content-end">
        <a href="{{ route('followupAdd',['id'=>request('id')]) }}" class="btn btn-primary">Add Follow-Up</a>
    </div>
</div>
<div class="table-responsive mt-3">
    <table id="quotationTable" class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Sr</th>
                <th>Follow Up Date</th>
                <th>Follow Up Details</th>
                <th>Next Follow Up Date</th>
                <th>Follow Up with</th>
                <th>Follow Up by</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
    
            @foreach ($followups as $followup)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $followup->fu_done_date }}</td>
                <td>{{ $followup->fu_remark }}</td>
                <td>{{ $followup->fu_do_date }}</td>
                <td>{{ $followup->fu_with }}</td>
                <td>{{ $followup->emp->emp_name }}</td>
                
                
                <td>
                    <a class="btn btn-success btn-sm" href="{{ route('followupEdit',['pid'=>request('id'),'id'=>$followup->fu_id]) }}">Edit</a>
                    <form action="{{ route('followupDelete', ['pid'=>request('id'),'id'=>$followup->fu_id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this?')">
                        @csrf
                        
                        <button type="submit" class="btn btn-danger ">Delete</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection