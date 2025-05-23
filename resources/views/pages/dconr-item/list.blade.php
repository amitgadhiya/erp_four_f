@extends('layouts.default')
@section('title')
 Outward Returnable DC Items
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6">
        <table>
            <tr>
                <td>DC No</td>
                <td>{{ $dc->dconr_number}}</td>
            </tr>
            <tr>
                <td>DC Date</td>
                <td>{{ $dc->dconr_date}}</td>
            </tr>
            <tr>
                <td>Party</td>
                <td>{{$dc->party->party_name}}</td>
            </tr>
        </table>
    </div>
    <div class="col-lg-6  text-end">
        <a href="{{ route('dconrItemAdd',request('id')) }}" class="btn btn-primary">Add</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="gstTable" class="display">
    <thead>
        <tr>
            <th>Sr</th>
            <th>DC No</th>
            <th>Item</th>
            <th>Qty</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        

@foreach ($items as $item)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $item->dc->dconr_number }}</td>
    <td>{{ $item->item->item_name }}</td>
    <td>{{ $item->dconri_qty }}</td>
    <td>
        <a href="{{ route('dconrItemEdit', ['pid'=>$item->dconri_dconr_id,'id'=>$item->dconri_id]) }}" class="btn btn-link" >Edit</a>
        <form action="{{ route('dconrItemDelete', ['pid'=>$item->dconri_dconr_id,'id'=>$item->dconri_id]) }}" method="POST" style="display:inline;" onsubmit="return confirmDelete()">
            @csrf
            <button  type="submit" class="btn btn-link">Delete</button>
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