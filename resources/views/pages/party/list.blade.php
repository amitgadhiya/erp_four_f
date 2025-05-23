@extends('layouts.default')
@section('title')
Party List 
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('partyAdd') }}" class="btn btn-primary">Add Pary</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="clientTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Type Code</th>
            <th>GST</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($parties as $party)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $party->party_name }}</td>
    <td>{{ $party->party_vender ? "Vender": "" }} {{ $party->party_client ? "Client": "" }}</td>
    <td>{{ $party->party_gst }}</td>
    <td>
        <a href="{{ route('partyEdit', $party->party_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('partyDelete', $party->party_id) }}" onclick="return confirm('Are you sure you want to delete it')" class="btn btn-danger" >Delete</a>
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
        $('#clientTable').DataTable({
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