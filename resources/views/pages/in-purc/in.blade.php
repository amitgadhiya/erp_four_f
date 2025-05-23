@extends('layouts.default')
@section('title')
    Purchase Inward
@endsection
@section('content')
<div class="row mt-3">
    <div class="col-lg-4">
        <table class="table">
            <tr>
                <td>PO No</td>
                <td>PO-24-001</td>
            </tr>
            <tr>
                <td>PO No</td>
                <td>05-12-2024</td>
            </tr>
            <tr>
                <td>Vender</td>
                <td>Name of Vender</td>
            </tr>
            <tr>
                <td>Invoice No</td>
                <td><input type="text"></td>
            </tr>
            
        </table>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <form action="">
        <table class="table">
            <thead>
                <tr>
                    <td>Sr</td>
                    <td>Item</td>
                    <td>Qty</td>
                    <td>Balance</td>
                    <td>Received</td>
                    
                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>item name</td>
                    <td>2</td>
                    <td>2</td>
                    <td><input type="text" class="form-control"></td>
                    
                </tr>
                <tr>
                    <td>2</td>
                    <td>item name</td>
                    <td>1</td>
                    <td>1</td>
                    <td><input type="text" class="form-control"></td>
                    
                </tr>
            </tbody>
        </table>
        <a href="#" class="btn btn-primary mt-3">Submit</a>
    </form>
    </div>
</div>
@endsection
