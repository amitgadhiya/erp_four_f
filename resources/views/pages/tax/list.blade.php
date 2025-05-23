@extends('layouts.default')
@section('title')
    Tax List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('taxAdd') }}" class="btn btn-primary">Add Tax</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="gstTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Name</th>
            <th>Percent</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($taxs as $tax)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $tax->tax_name }}</td>
    <td>{{ $tax->tax_percent }}%</td>
    <td>
        <a href="{{ route('taxEdit', $tax->tax_id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('taxDelete', $tax->tax_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
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