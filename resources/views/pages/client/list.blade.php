@extends('layouts.default')
@section('title')
    List Client
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('client.add') }}" class="btn btn-primary">Add Client</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="clientTable" class="display">
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
    $clients = [
        (object) [
            'id' => 1,
            'name' => 'Client 1',
            'email' => 'client1@example.com',
            'gst' => 'GSTIN1',
        ],
        (object) [
            'id' => 2,
            'name' => 'Client 2',
            'email' => 'client2@example.com',
            'gst' => 'GSTIN2',
        ],
        (object) [
            'id' => 3,
            'name' => 'Client 3',
            'email' => 'client3@example.com',
            'gst' => 'GSTIN3',
        ],
        (object) [
            'id' => 4,
            'name' => 'Client 4',
            'email' => 'client4@example.com',
            'gst' => 'GSTIN4',
        ],
        (object) [
            'id' => 5,
            'name' => 'Client 5',
            'email' => 'client5@example.com',
            'gst' => 'GSTIN5',
        ],
        (object) [
            'id' => 6,
            'name' => 'Client 6',
            'email' => 'client6@example.com',
            'gst' => 'GSTIN6',
        ],
        (object) [
            'id' => 7,
            'name' => 'Client 7',
            'email' => 'client7@example.com',
            'gst' => 'GSTIN7',
        ],
        (object) [
            'id' => 8,
            'name' => 'Client 8',
            'email' => 'client8@example.com',
            'gst' => 'GSTIN8',
        ],
        (object) [
            'id' => 9,
            'name' => 'Client 9',
            'email' => 'client9@example.com',
            'gst' => 'GSTIN9',
        ],
        (object) [
            'id' => 10,
            'name' => 'Client 10',
            'email' => 'client10@example.com',
            'gst' => 'GSTIN10',
        ],
        (object) [
            'id' => 11,
            'name' => 'Admin Client',
            'email' => 'admin@example.com',
            'gst' => 'GSTIN_ADMIN',
        ],
    ];
@endphp

@foreach ($clients as $client)
<tr>
    <td>{{ $client->id }}</td>
    <td>{{ $client->name }}</td>
    <td>{{ $client->email }}</td>
    <td>{{ $client->gst }}</td>
    <td>
        <a href="{{ route('client.edit', $client->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('client.delete', $client->id) }}" method="POST" style="display:inline;">
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