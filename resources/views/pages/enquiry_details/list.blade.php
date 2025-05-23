@extends('layouts.default')
@section('title')
    Enquiry Details
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('enquiry')}}"> < Back</a>
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
        <form action="{{route('enqdetailsAddPost',['id'=>request('id')])}}" method="post" class="d-flex gap-2 align-items-center">
            @csrf
            <input type="text" name="product" class="form-control" placeholder="Product" required>
            <input type="number" name="quantity" class="form-control" placeholder="Qty" required style="width: 100px;">
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
                <td>Action</td>
            </tr>
            @foreach ($enqds as $enqd)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$enqd->enqd_product}}</td>
                    <td>{{$enqd->enqd_qunt}}</td>
                    <td>
                        <a href="{{route('enqdetailsEdit',['pid'=>$enqd->enqd_enq_id,'id'=>$enqd->enqd_id])}}">Edit</a> | 
                        
                        <form action="{{ route('enqdetailsDelete', ['pid'=>$enqd->enqd_enq_id,'id'=>$enqd->enqd_id]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this?')">
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