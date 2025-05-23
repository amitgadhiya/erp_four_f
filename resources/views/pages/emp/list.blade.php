@extends('layouts.default')
@section('title')
     Employee List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('empAdd') }}" class="btn btn-primary">Add Employee</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="userTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        
        @foreach ($emps as $emp)
            <tr>
                <td>{{ $emp->emp_id }}</td>
                <td>{{ $emp->emp_name }}</td>
                <td>{{ $emp->dept->dept_name }}</td>
                <td>{{ $emp->emp_email }}</td>
                <td>{{ $emp->emp_mobile }}</td>
                
                <td>
                    <a href="{{ route('empEdit', $emp->emp_id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('empDelete', $emp->emp_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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
        $('#userTable').DataTable({
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