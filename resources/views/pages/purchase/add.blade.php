@extends('layouts.default')
@section('title')
    Purchase Add
@endsection
@section('content')
<div class="container mt-4">
    <h4>Purchase Record Form</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="purchase-date" class="form-label">Purchase Date</label>
            <input type="date" id="purchase-date" name="purchase_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="purchase-no" class="form-label">Purchase Order No</label>
            <input type="text" id="purchase-no" name="purchase_no" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="supplier" class="form-label">Supplier Name</label>
            <input type="text" id="supplier" name="supplier" class="form-control" required>
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
            <label for="total-cost" class="form-label">Total Cost</label>
            <input type="number" step="0.01" id="total-cost" name="total_cost" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection