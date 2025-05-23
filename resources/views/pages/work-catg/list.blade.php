@extends('layouts.default')
@section('title')
Work Category List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('workCatgAdd') }}" class="btn btn-primary">Add Work Category</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="gstTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($wcs as $workcatg)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $workcatg->wc_name }}</td>
    <td>{{ $workcatg->wc_type }}</td>
    <td>
        <a href="{{ route('workCatgEdit', $workcatg->wc_id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('workCatgDelete', $workcatg->wc_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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