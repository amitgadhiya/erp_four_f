@extends('layouts.default')
@section('title')
    List Vender
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('vender.add') }}" class="btn btn-primary">Add Vender</a>
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
        @php
    $venders = [
        (object) [
            'id' => 1,
            'name' => 'Vender 1',
            'email' => 'vender1@example.com',
            'gst' => 'GSTIN1',
        ],
        (object) [
            'id' => 2,
            'name' => 'Vender 2',
            'email' => 'vender2@example.com',
            'gst' => 'GSTIN2',
        ],
        (object) [
            'id' => 3,
            'name' => 'Vender 3',
            'email' => 'vender3@example.com',
            'gst' => 'GSTIN3',
        ],
        (object) [
            'id' => 4,
            'name' => 'Vender 4',
            'email' => 'vender4@example.com',
            'gst' => 'GSTIN4',
        ],
        (object) [
            'id' => 5,
            'name' => 'Vender 5',
            'email' => 'vender5@example.com',
            'gst' => 'GSTIN5',
        ],
        (object) [
            'id' => 6,
            'name' => 'Vender 6',
            'email' => 'vender6@example.com',
            'gst' => 'GSTIN6',
        ],
        (object) [
            'id' => 7,
            'name' => 'Vender 7',
            'email' => 'vender7@example.com',
            'gst' => 'GSTIN7',
        ],
        (object) [
            'id' => 8,
            'name' => 'Vender 8',
            'email' => 'vender8@example.com',
            'gst' => 'GSTIN8',
        ],
        (object) [
            'id' => 9,
            'name' => 'Vender 9',
            'email' => 'vender9@example.com',
            'gst' => 'GSTIN9',
        ],
        (object) [
            'id' => 10,
            'name' => 'Vender ender 10',
            'email' => 'vender10@example.com',
            'gst' => 'GSTIN10',
        ],
        (object) [
            'id' => 11,
            'name' => 'Admin Vender',
            'email' => 'admin@example.com',
            'gst' => 'GSTIN_ADMIN',
        ],
    ];
@endphp

@foreach ($venders as $vender)
<tr>
    <td>{{ $vender->id }}</td>
    <td>{{ $vender->name }}</td>
    <td>{{ $vender->email }}</td>
    <td>{{ $vender->gst }}</td>
    <td>
        <a href="{{ route('vender.edit', $vender->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('vender.delete', $vender->id) }}" method="POST" style="display:inline;">
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