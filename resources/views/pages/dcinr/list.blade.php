@extends('layouts.default')
@section('title')
 Inward Non Returnable DC
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        {{-- <a href="{{ route('dcinrAdd') }}" class="btn btn-primary">Add</a> --}}
    </div>
</div>
<div class="table-responsive mt-3">
<table id="gstTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>Date</th>
            <th>Number</th>
            <th>Party</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($dcs as $dc)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $dc->dcinr_date }}</td>
    <td>{{ $dc->dcinr_number }}</td>
    <td>{{ $dc->party->party_name }}</td>
    <td>
        {{-- <a href="{{ route('dcinrEdit', $dc->dcinr_id) }}" class="btn btn-primary" >Edit</a>
        <form action="{{ route('dcinrDelete', $dc->dcinr_id) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
            @csrf
            <button  type="submit" class="btn btn-danger">Delete</button>
        </form> --}}
        <a href="{{ route('dcinrView', $dc->dcinr_id) }}" class="btn btn-primary" >View</a>

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