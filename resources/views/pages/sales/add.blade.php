@extends('layouts.default')
@section('title')
    Sales Add
@endsection
@section('content')
    <div class="container mt-4">



        <form action="" method="post" class="form-group">
            <div class="row">
                <div class="col-lg-3">
                    <div class="mb-3">
                        <label for="sales-date" class="form-label">Sales Date</label>
                        <input type="date" id="sales-date" name="sales_date" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="invoice-no" class="form-label">Invoice No</label>
                        <input type="text" id="invoice-no" name="invoice_no" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="customer-name" class="form-label">Customer Name</label>
                        <input type="text" id="customer-name" name="customer_name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="remarks" class="form-label">Remarks</label>
                        <textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
