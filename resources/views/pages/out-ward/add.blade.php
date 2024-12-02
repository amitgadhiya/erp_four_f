@extends('layouts.default')
@section('title')
    Out-Ward Add
@endsection
@section('content')
<div class="container mt-4">
    <h4>Outward Record Form</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="outward-no" class="form-label">Outward No</label>
            <input type="text" id="outward-no" name="outward_no" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="customer" class="form-label">Customer Name</label>
            <input type="text" id="customer" name="customer" class="form-control" required>
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
            <label for="delivered-by" class="form-label">Delivered By</label>
            <input type="text" id="delivered-by" name="delivered_by" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

