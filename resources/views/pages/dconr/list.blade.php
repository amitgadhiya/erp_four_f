@extends('layouts.default')
@section('title')
 Outward Non Returnable DC
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('dconrAdd') }}" class="btn btn-primary">Add</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="gstTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Date</th>
            <th>Number</th>
            <th>Party</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($dcs as $dc)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $dc->dconr_date }}</td>
    <td>{{ $dc->dconr_number }}</td>
    <td>{{ $dc->party->party_name }}</td>
    <td>
        <a href="{{ route('dconrView', $dc->dconr_id) }}" class="btn btn-link" >View</a>
        @if ($dc->dconr_dispactch_status != "done")
            
        
        <a href="{{ route('dconrItem', $dc->dconr_id) }}" class="btn btn-link" >Manage</a>
        <a href="{{ route('dconrEdit', $dc->dconr_id) }}" class="btn btn-link" >Edit</a>
        <form action="{{ route('dconrDelete', $dc->dconr_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
            @csrf
            <button  type="submit" class="btn btn-link">Delete</button>
        </form>
        @endif
    </td>
</tr>
@endforeach
    </tbody>
</table>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#gstTable').DataTable({
            // You can customize the DataTable options here
            responsive: true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endsection