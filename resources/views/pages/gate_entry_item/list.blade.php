@extends('layouts.default')
@section('title')
    Gate Entery Item
@endsection
@section('content')

<div class="row">
    <div class="col-lg-6">
        <a href="{{route('gateEntry')}}" class="btn btn-link">< Back</a>
    </div>
    <div class="col-lg-6 text-right">
        <a href="{{route('gateEntryItemAdd',request('id'))}}" class="btn btn-success">Add</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12">
        <table class="table">
            <tr>
                <td>Sr.</td>
                <td>Item</td>
                <td>Rate</td>
                <td>Quantity</td>
                <td>Tax</td>
                <td>Action</td>
            </tr>
            @foreach ($geis as $gei)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$gei->item->item_name}}</td>
                <td>{{$gei->gei_rate}}</td>
                <td>{{$gei->gei_qty}}</td>
                <td>{{$gei->tax->tax_name ?? ""}}</td>
                
                <td>
                    <a href="{{route('gateEntryItemEdit',['pid'=>request('id'),'id'=>$gei->gei_id])}}">Edit</a> | <a href="{{route('gateEntryItemDelete',['pid'=>request('id'),'id'=>$gei->gei_id])}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
