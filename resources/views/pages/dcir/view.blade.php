@extends('layouts.default')
@section('title')
 Inward Returnable DC
@endsection
@section('content')
<div class="row">
    <div class="col-lg-6 ">
        <table class="table">
    
            <tr>
                <td>Party</td>
                <td>{{$dc->party->party_name}}</td>
            </tr>
            <tr>
                <td>Date</td>
                <td>{{$dc->dcir_date}}</td>
            </tr>
            <tr>
                <td>DC Number</td>
                <td>{{$dc->dcir_number}}</td>
            </tr>
    </table>
    </div>
    <div class="col-lg-6 ">
        {{-- <a href="{{ route('dcirAdd') }}" class="btn btn-primary">Add</a> --}}
    </div>
</div>

<div class="table-responsive mt-3">
<form method="post" action="{{ route('dconrAddPostFromDCin') }}">
    @csrf

        
<table class="table">
    <tr>
        <th>Sr</th>
        <th>Item</th>
        <th>Qty</th>
        <th>Balance</th>
        <th>Return</th>
        
    </tr>
@foreach ($dc->items as $dci)
<tr>
    <td>{{ $loop->index+1 }}</td>
    <td>{{ $dci->item->item_name }}</td>
    <td>{{ $dci->dciri_qty }}</td>
    <td>{{ $dci->dciri_balance }}</td>
    <td><input max="{{ $dci->dciri_balance }}" required class="form-control" type="number" name="{{ $dci->dciri_id }}" id="{{ $dci->dciri_id }}" @if ($dci->dciri_balance <= 0)
        disabled
    @endif  ></td>
    
    
</tr>
@endforeach
    
</table>
<input type="submit" value="Return" class="mt-4 btn btn-success">
</form>
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