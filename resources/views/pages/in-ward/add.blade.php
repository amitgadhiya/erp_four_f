@extends('layouts.default')
@section('title')
    In-Ward Add
@endsection
@section('content')
<div class="container mt-4">
    <h4>Inward Record Form</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" id="date" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="inward-no" class="form-label">Inward No</label>
            <input type="text" id="inward-no" name="inward_no" class="form-control" required>
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
            <label for="received-by" class="form-label">Received By</label>
            <input type="text" id="received-by" name="received_by" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection