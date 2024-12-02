@extends('layouts.default')
@section('title')
    Sales Add
@endsection
@section('content')
<div class="container mt-4">
    <h4>Sales Record Form</h4>
    <form action="" method="post" class="form-group">
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
            <label for="material" class="form-label">Material</label>
            <input type="text" id="material" name="material" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" id="quantity" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <select id="unit" name="unit" class="form-select" required>
                <option value="" selected disabled>Select Unit</option>
                <option value="Kg">Kg</option>
                <option value="Liters">Liters</option>
                <option value="Meters">Meters</option>
                <option value="Pieces">Pieces</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="total-amount" class="form-label">Total Amount (Rs)</label>
            <input type="number" step="0.01" id="total-amount" name="total_amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection