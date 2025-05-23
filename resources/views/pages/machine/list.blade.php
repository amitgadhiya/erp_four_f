@extends('layouts.default')
@section('title')
    List Machine
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('machineAdd') }}" class="btn btn-primary">Add Machine</a>
    </div>
</div>
<div class="table-responsive mt-3">
    <table id="machineTable" class="display">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Machine Name</th>
                <th>Number</th>
                <th>Model</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($machines as $machine)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $machine->mach_name }}</td>
                <td>{{ $machine->mach_no }}</td>
                <td>{{ $machine->mach_model }}</td>
                <td>
                    <a href="{{route("machineEdit",$machine->mach_id)}}" class="btn btn-info btn-sm">Edit</a>
                    <a href="{{route("machineDelete",$machine->mach_id)}}" onclick="return confirm('Are you sure you want to delete it')" class="btn btn-danger btn-sm">Delete</a>
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
        $('#machineTable').DataTable({
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