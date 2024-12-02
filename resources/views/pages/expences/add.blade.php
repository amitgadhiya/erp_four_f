@extends('layouts.default')
@section('title')
Expense List
@endsection
@section('content')
<div class="container mt-4">
    <h4>Expense Record Form</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="expense-date" class="form-label">Expense Date</label>
            <input type="date" id="expense-date" name="expense_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="expense-category" class="form-label">Category</label>
            <select id="expense-category" name="expense_category" class="form-select" required>
                <option value="" selected disabled>Select Category</option>
                <option value="Rent">Rent</option>
                <option value="Salaries">Salaries</option>
                <option value="Utilities">Utilities</option>
                <option value="Supplies">Supplies</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount (Rs)</label>
            <input type="number" step="0.01" id="amount" name="amount" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="payment-method" class="form-label">Payment Method</label>
            <select id="payment-method" name="payment_method" class="form-select" required>
                <option value="" selected disabled>Select Payment Method</option>
                <option value="Cash">Cash</option>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Credit Card">Credit Card</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="remarks" class="form-label">Remarks</label>
            <textarea id="remarks" name="remarks" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection