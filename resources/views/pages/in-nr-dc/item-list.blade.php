@extends('layouts.default')
@section('title')
    Inward Non-Returnable DC
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 text-right">
        <a class="btn btn-primary" href="{{route('in-r-dc.item-add')}}">Add</a>
        <a class="btn btn-primary" href="#">Close</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <td>Sr</td>
                    <td>Item</td>
                    <td>Qty</td>
                    
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>item name</td>
                    <td>DC-ABC-123</td>
                    
                    <td>2</td>
                    <td>
                        <a href="#">Edit</a> | 
                        <a href="#">Delete</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
