@extends('layouts.default')
@section('title')
     PO Item Edit
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('po_item.edit.post')}}" method="POST">
            <div class="row">
                <div class="col-lg-4">

                    <!-- CSRF Token (if needed in Laravel) -->
                    @csrf

                    <!-- Sr. (Serial Number) -->
                    <div class="form-group">
                        <label for="serialNumber">Sr.</label>
                        <input type="number" class="form-control" id="serialNumber" name="serialNumber"
                            placeholder="Enter serial number" required>
                    </div>

                    <!-- Item Name -->
                    <div class="form-group">
                        <label for="itemName">Item Name</label>
                        <input type="text" class="form-control" id="itemName" name="itemName"
                            placeholder="Enter item name" required>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group">
                        <label for="quantity">Qty</label>
                        <input type="number" class="form-control" id="quantity" name="quantity"
                            placeholder="Enter quantity" required>
                    </div>

                    <!-- Rate -->
                    <div class="form-group">
                        <label for="rate">Rate</label>
                        <input type="number" step="0.01" class="form-control" id="rate" name="rate"
                            placeholder="Enter rate" required>
                    </div>

                    <!-- Discount -->
                    <div class="form-group">
                        <label for="discount">Dis (Discount)</label>
                        <input type="number" step="0.01" class="form-control" id="discount" name="discount"
                            placeholder="Enter discount" required>
                    </div>

                    <!-- Tax -->
                    <div class="form-group">
                        <label for="tax">Tax</label>
                        <input type="number" step="0.01" class="form-control" id="tax" name="tax"
                            placeholder="Enter tax" required>
                    </div>

                    <!-- Amount -->
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount"
                            placeholder="Enter amount" required>
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Select Status</option>
                            <option value="pending">Pending</option>
                            <option value="completed">Completed</option>
                            <option value="shipped">Shipped</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Item</button>

                </div>

            </div>
        </form>

    </div>
</div>
@endsection

@section('script')
@endsection