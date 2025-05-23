@extends('layouts.default')
@section('title')
    Item category List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('icAdd') }}" class="btn btn-primary">Add Item category </a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="gstTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Shot name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($ics as $ic)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $ic->ic_name }}</td>
    <td>{{ $ic->ic_shot }}</td>
    <td>
        <a href="{{ route('icEdit', $ic->ic_id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('icDelete', $ic->ic_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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