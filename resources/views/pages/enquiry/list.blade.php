@extends('layouts.default')
@section('title')
    List Enquiry
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('enquiry.add') }}" class="btn btn-primary">Add Enquiry</a>
    </div>
</div>
<div class="table-responsive mt-3">
    <table id="enquiryTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Enquiry No</th>
                <th>Client</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php
                $clients = [
                    (object) [
                        'id' => 1,
                        'enquiry_no' => 'EN001',
                        'client' => 'Client 1',
                        'date' => '2024-10-01',
                    ],
                    (object) [
                        'id' => 2,
                        'enquiry_no' => 'EN002',
                        'client' => 'Client 2',
                        'date' => '2024-10-02',
                    ],
                    (object) [
                        'id' => 3,
                        'enquiry_no' => 'EN003',
                        'client' => 'Client 3',
                        'date' => '2024-10-03',
                    ],
                    (object) [
                        'id' => 4,
                        'enquiry_no' => 'EN004',
                        'client' => 'Client 4',
                        'date' => '2024-10-04',
                    ],
                    (object) [
                        'id' => 5,
                        'enquiry_no' => 'EN005',
                        'client' => 'Client 5',
                        'date' => '2024-10-05',
                    ],
                    // Add more clients as needed
                ];
            @endphp
    
            @foreach ($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->enquiry_no }}</td>
                <td>{{ $client->client }}</td>
                <td>{{ $client->date }}</td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $client->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $client->id }}">
                            {{-- <li><a class="dropdown-item" href="{{ route('enquiry.view', $client->id) }}">View</a></li> --}}
                            
                            <li><a class="dropdown-item" href="{{ route('enquiry.edit', $client->id) }}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{ route('quotation.add', $client->id) }}">convert to quotation</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Save as</a></li> --}}
                        </ul>
                    </div>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<style>
    .btn-link {
        padding: 0;
        margin: 0;
    }
    .fa-ellipsis-v {
        font-size: 18px;
        cursor: pointer;
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#enquiryTable').DataTable({
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