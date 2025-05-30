@extends('layouts.default')

@section('title')
    Design Work 
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12 d-flex justify-content-end">
            <a href="{{ route('designWorkAdd') }}" class="btn btn-primary">Add Work Log</a>
        </div>
    </div>
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Project No</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Work Description</th>
                    <th>Work Category</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
               
                @forelse($workLogs as $log)
                @php
                    $minutes = $log->dw_total_min; // example
                    $hours = floor($minutes / 60);
                    $mins = $minutes % 60;
                    $formattedTime = sprintf('%02d:%02d', $hours, $mins);
                @endphp
                    <tr>
                        <td>{{ optional($log->project)->pro_number }} {{ optional($log->enq)->enq_number }}</td>
                        <td>{{ \Carbon\Carbon::parse($log->dw_start_time)->format('Y-m-d') }}</td>
                        <td>{{ $log->emp->emp_name }}</td>
                        <td>{{ $log->dw_desc }}</td>
                        <td>{{ $log->catg->wc_name }}</td>
                        <td>{{ $log->dw_start_time }}</td>
                        <td>{{ $log->dw_end_time }}</td>
                        <td>{{ $formattedTime }}</td>
                        <td>
                            <a href="{{route('designWorkEdit',$log->dw_id)}}"> Edit</a> | 
                            <form action="{{ route('designWorkDelete', $log->dw_id) }}" method="POST" >
                                @csrf
                                <button type="submit" class="btn btn-link" onclick="return confirm('Are you sure you want to delete this item?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
