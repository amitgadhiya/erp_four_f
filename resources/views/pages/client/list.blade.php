@extends('layouts.default')
@section('title')
Client List 
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('clientAdd') }}" class="btn btn-primary">Add Client</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="clientTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Vender Code</th>
            <th>GST</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($clients as $client)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $client->client_name }}</td>
    <td>{{ $client->client_vender_code }}</td>
    <td>{{ $client->client_gst_no }}</td>
    <td>
        <a href="{{ route('clientEdit', $client->client_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('clientDelete', $client->client_id) }}" onclick="return confirm('Are you sure you want to delete it')" class="btn btn-danger" >Delete</a>
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