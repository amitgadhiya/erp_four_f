@extends('layouts.default')
@section('title')
    List Machine
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('machine.add') }}" class="btn btn-primary">Add Machine</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="machineTable" class="display">
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
        @php
    $machines = [
        (object) [
            'id' => 1,
            'name' => 'Machine 1',
            'email' => 'vender1@example.com',
            'gst' => 'GSTIN1',
        ],
        (object) [
            'id' => 2,
            'name' => 'Machine 2',
            'email' => 'vender2@example.com',
            'gst' => 'GSTIN2',
        ],
        (object) [
            'id' => 3,
            'name' => 'Machine 3',
            'email' => 'vender3@example.com',
            'gst' => 'GSTIN3',
        ],
        (object) [
            'id' => 4,
            'name' => 'Machine 4',
            'email' => 'vender4@example.com',
            'gst' => 'GSTIN4',
        ],
        (object) [
            'id' => 5,
            'name' => 'Machine 5',
            'email' => 'vender5@example.com',
            'gst' => 'GSTIN5',
        ],
        (object) [
            'id' => 6,
            'name' => 'Machine 6',
            'email' => 'vender6@example.com',
            'gst' => 'GSTIN6',
        ],
        (object) [
            'id' => 7,
            'name' => 'Machine 7',
            'email' => 'vender7@example.com',
            'gst' => 'GSTIN7',
        ],
        (object) [
            'id' => 8,
            'name' => 'Machine 8',
            'email' => 'vender8@example.com',
            'gst' => 'GSTIN8',
        ],
        (object) [
            'id' => 9,
            'name' => 'Machine 9',
            'email' => 'vender9@example.com',
            'gst' => 'GSTIN9',
        ],
        (object) [
            'id' => 10,
            'name' => 'Machine ender 10',
            'email' => 'vender10@example.com',
            'gst' => 'GSTIN10',
        ],
        (object) [
            'id' => 11,
            'name' => 'Admin Machine',
            'email' => 'admin@example.com',
            'gst' => 'GSTIN_ADMIN',
        ],
    ];
@endphp

@foreach ($machines as $machine)
<tr>
    <td>{{ $machine->id }}</td>
    <td>{{ $machine->name }}</td>
    <td>{{ $machine->email }}</td>
    <td>{{ $machine->gst }}</td>
    <td>
        <a href="{{ route('machine.edit', $machine->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('machine.delete', $machine->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
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