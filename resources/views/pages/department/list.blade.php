@extends('layouts.default')
@section('title')
    Department List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('departmentAdd') }}" class="btn btn-primary">Add Department</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="gstTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($depts as $dept)
<tr>
    <td>{{ $dept->dept_id }}</td>
    <td>{{ $dept->dept_name }}</td>
    <td>
        <a href="{{ route('departmentEdit', $dept->dept_id) }}" class="btn btn-primary" >Edit</a>
        <form action="{{ route('departmentDelete', $dept->dept_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
            @csrf
            <button  type="submit" class="btn btn-danger">Delete</button>
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