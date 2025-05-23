@extends('layouts.default')
@section('title')
    Sales List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12"><hr></div>
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-5">
                <div class="mb-3">
                    <label for="name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
            </div>
            <div class="col-lg-1">
                <div class="mb-3">
                    <label for="name" class="form-label">Quantity </label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
            </div>
            <div class="col-lg-1">
                <div class="mb-3">
                    <label for="name" class="form-label">Rate </label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
            </div>
            <div class="col-lg-1">
                <div class="mb-3">
                    <label for="name" class="form-label">Taxes </label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
            </div>
            <div class="col-lg-1">
                <div class="mb-3">
                    <label for="name" class="form-label">Discount </label>
                    <input type="text" class="form-control" id="name" name="name" >
                </div>
            </div>
            
            <div class="col-lg-1 d-flex justify-content-center align-items-center" >
                <a href="#">Add</a>
            </div>
        </div>
        
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <tr>
                <td>SR.</td>
                <td>Item</td>
                <td>Qty</td>
                <td>Rate</td>
                <td>Tax</td>
                <td>Discount</td>
                <td>Amount</td>
                
                <td>Action</td>
            </tr>
            <tr>
                <td>1.</td>
                <td>Item</td>
                <td>1</td>
                <td>10000</td>
                <td>1800</td>
                <td>0</td>
                <td>11800</td>
                
                <td><a href="#">Edit</a><br><a href="#">Del</a></td>
            </tr>
            <tr>
                <td>2.</td>
                <td>Item</td>
                <td>1</td>
                <td>10000</td>
                <td>1800</td>
                <td>0</td>
                <td>11800</td>
                
                <td><a href="#">Edit</a><br><a href="#">Del</a></td>
            </tr>
        </table>
    </div>
</div>
@endsection
