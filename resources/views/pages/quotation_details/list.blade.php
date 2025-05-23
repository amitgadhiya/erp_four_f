@extends('layouts.default')
@section('title')
    Quotation Details
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('quotation')}}"> < Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <table>
            <tr>
                <td>Quotation No : </td>
                <td><strong>{{$quotation->quot_number}}</strong></td>
            </tr>
            <tr>
                <td>Quotation Date : </td>
                <td><strong>{{$quotation->quot_date}}</strong></td>
            </tr>
            <tr>
                <td>Customer : </td>
                <td><strong>{{$quotation->party->party_name}}</strong></td>
            </tr>
            
        </table>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12">
        <form action="{{route('quotationdetailAddPost',['id'=>request('id')])}}" method="post" class="d-flex gap-2 align-items-center">
            @csrf
            <input type="text" name="product" class="form-control" placeholder="Product" required>
            <input type="number" name="quantity" class="form-control" placeholder="Qty" required style="width: 150px;">
            <input type="number" name="rate" class="form-control" placeholder="Rate" required style="width: 150px;">
            
            <select name="tax" id="tax" class="form-select" required style="width: 150px;">
                <option value="">Select</option>
                @foreach ($taxs as $tax)
                <option value="{{$tax->tax_id}}">{{$tax->tax_name}}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-12">
        <table class="table">
            <tr>
                <td>Sr</td>
                <td>Product</td>
                <td>Qty</td>
                <td>Rate</td>
                <td>Tax</td>
                <td>Action</td>
            </tr>
            @foreach ($quotation_details as $qds)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$qds->qd_name}}</td>
                    <td>{{$qds->qd_qty}}</td>
                    <td>{{$qds->qd_rate}}</td>
                    <td>{{$qds->tax->tax_name}}</td>
                    <td>
                        <a href="{{route('quotationdetailEdit',['pid'=>$qds->qd_qout_id,'id'=>$qds->qd_id])}}">Edit</a> | 
                        
                        <form action="{{ route('quotationdetailDelete', ['pid'=>$qds->qd_qout_id,'id'=>$qds->qd_id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this?')">
                            @csrf
                            
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>


@endsection
@section('script')

@endsection