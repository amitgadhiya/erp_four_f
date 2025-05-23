@extends('layouts.default')
@section('title')
    Add Purchase Inward
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{route('purchaseInPost')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Purchase Order No</label>
                        <input id="po_number" name="po_number" required class="form-control" type="text" value="" >
                    </div> 
                     
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
