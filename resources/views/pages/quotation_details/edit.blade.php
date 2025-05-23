@extends('layouts.default')
@section('title')
    Edit Quotation Details
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('quotationdetail',['id'=>$quotation_details->qd_qout_id])}}"> < Back</a>
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
                <td>Enquery Date : </td>
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
    <div class="col-lg-8">
        
        <form action="{{route('quotationdetailEditPost',['pid'=>$quotation->quot_id,'id'=>$quotation_details->qd_id])}}" method="post" class="d-flex gap-2 align-items-center">
            @csrf
            <input type="text" name="sr" class="form-control" placeholder="Sr" value="{{$quotation_details->qd_sr}}" required>
            <input type="text" name="product" class="form-control" placeholder="Product" value="{{$quotation_details->qd_name}}" required>
            <input type="number" name="quantity" class="form-control" placeholder="Qty" value="{{$quotation_details->qd_qty}}" required style="width: 100px;">
            <input type="number" name="rate" class="form-control" placeholder="Rate" value="{{$quotation_details->qd_rate}}" required style="width: 100px;">
            <select name="tax" id="tax" required class="form-select">
                <option value="{{$quotation_details->tax->tax_id}}">{{$quotation_details->tax->tax_name}}</option>
                @foreach ($taxs as $tax)
                <option value="{{$tax->tax_id}}">{{$tax->tax_name}}</option>
                @endforeach
            </select>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

@endsection
@section('script')
<script>
window.onload = () => document.getElementById('date').value = new Date().toISOString().split('T')[0];
</script>

@endsection