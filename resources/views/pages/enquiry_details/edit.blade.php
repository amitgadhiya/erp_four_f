@extends('layouts.default')
@section('title')
    Edit Enquiry
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('enqdetails',['id'=>$enq->enq_id])}}"> < Back</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <table>
            <tr>
                <td>Enquery No : </td>
                <td><strong>{{$enq->enq_number}}</strong></td>
            </tr>
            <tr>
                <td>Enquery Date : </td>
                <td><strong>{{$enq->enq_date}}</strong></td>
            </tr>
            <tr>
                <td>customer : </td>
                <td><strong>{{$enq->party->party_name}}</strong></td>
            </tr>
            <tr>
                <td>Input : </td>
                <td><strong>{{$enq->enq_input}}</strong></td>
            </tr>
            <tr>
                <td>Concept working : </td>
                <td><strong>{{$enq->enq_cons_work}}</strong></td>
            </tr>
            <tr>
                <td>Concept Approcval : </td>
                <td><strong>{{$enq->enq_cons_app}}</strong></td>
            </tr>
        </table>
    </div>
</div>
<div class="row mt-5">
    <div class="col-lg-8">
        
        <form action="{{route('enqdetailsEditPost',['pid'=>$enqd->enqd_id,'id'=>$enqd->enqd_enq_id])}}" method="post" class="d-flex gap-2 align-items-center">
            @csrf
            <input type="text" name="product" class="form-control" placeholder="Product" value="{{$enqd->enqd_product}}" required>
            <input type="number" name="quantity" class="form-control" placeholder="Qty" value="{{$enqd->enqd_qunt}}" required style="width: 100px;">
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