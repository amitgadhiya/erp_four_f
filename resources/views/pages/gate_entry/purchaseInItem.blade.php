@extends('layouts.default')
@section('title')
     Purchase Order Inward
@endsection
@section('content')

<div class="row"> 
    <div class="col-lg-12">
        <form action="{{ route('purchaseInItemPost',['id'=>request('id')]) }}" method="POST">
            @csrf
        <p><strong>PO Number:</strong> {{ $po->po_number }}</p>
        <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($po->po_date)->format('d-m-Y') }}</p>
        <p>
            <strong>Name:</strong> {{ $po->party->party_name }}<br>
            <strong>Address:</strong> {{ $po->party->party_address }}<br>
            <strong>Phone:</strong> {{ $po->party->party_mobile }}<br>
            <strong>Email:</strong> {{ $po->party->party_email }}
        </p>
        <table class="table">
            <thead>
                <tr>
                    <th>Sr.</th>
                    <th>Description</th>
                    <th>Qty Ordered</th>
                    <th>Qty Received</th>
                    <th>Input</th>
                    <th>Balance</th>
                </tr>  
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach($po->items as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>
                        {{ $item->item->item_name }}<br>
                        {{ $item->poi_desc }}

                    </td>
                    <td>{{ $item->poi_qty }}</td>
                    <td>{{ $item->poi_qty_receive }}</td>
                    <td><input name="{{$item->poi_id}}_r" type="number" class="form-control" value="0" max="{{ $item->poi_qty - $item->poi_qty_receive}}"></td>
                    <td>{{ $item->poi_qty - $item->poi_qty_receive}}</td>
                    
                </tr>
                
                @endforeach
            </tbody>
            
        </table>
        <input type="submit" class="mt-3 btn btn-success" value="Save">
        </form>
    </div>
</div>
@endsection
