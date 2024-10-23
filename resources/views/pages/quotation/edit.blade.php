@extends('layouts.default')
@section('title')
    Edit Quotation
@endsection
@section('content')
<form action="{{ route('quotation.list') }}" method="get">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Client Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Date</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="gst" class="form-label">Quotation No</label>
                <input type="text" class="form-control" id="gst" name="gst" required>
            </div>
            
        </div>
    </div>
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
                <div class="col-lg-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Rate </label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="mb-3">
                        <label for="name" class="form-label">Discount </label>
                        <input type="text" class="form-control" id="name" name="name" >
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="mb-3">
                        <label for="name" class="form-label">Amount </label>
                        <input type="text" class="form-control" readonly id="name" name="name" >
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
                    <td>Discount</td>
                    <td>Amount</td>
                    <td></td>
                </tr>
                <tr>
                    <td>1.</td>
                    <td>Item</td>
                    <td>1</td>
                    <td>1,00,000</td>
                    <td>10%</td>
                    <td>1,00,000</td>
                    <td><a href="#">Edit</a><br><a href="#">Del</a></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Item</td>
                    <td>1</td>
                    <td>2,00,000</td>
                    <td>10%</td>
                    <td>2,00,000</td>
                    <td><a href="#">Edit</a><br><a href="#">Del</a></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary">Edit Quotation</button>
            <a href="{{ route('quotation.list') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection