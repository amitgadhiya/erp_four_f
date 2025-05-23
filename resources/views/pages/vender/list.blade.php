@extends('layouts.default',['__menu' => 'master','__menu_sub' => 'vender'])
@section('title')
    List Vender
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('venderAdd') }}" class="btn btn-primary">Add Vender</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="venderTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>GST</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
       

@foreach ($venders as $vender)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $vender->vender_name }}</td>
    <td>{{ $vender->vender_email }}</td>
    <td>{{ $vender->vender_gst_no }}</td>
    <td>
        <a href="{{ route('venderEdit', $vender->vender_id) }}" class="btn btn-primary">Edit</a>
        
        <form action="{{ route('venderDelete', $vender->vender_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
            @csrf
            
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
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
        $('#venderTable').DataTable({
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