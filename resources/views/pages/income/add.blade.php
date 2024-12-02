@extends('layouts.default')
@section('title')
    Income Add
@endsection
@section('content')
<div class="container mt-4">
    <h4>Income Record Form</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="income-date" class="form-label">Income Date</label>
            <input type="date" id="income-date" name="income_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="income-source" class="form-label">Income Source</label>
            <input type="text" id="income-source" name="income_source" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="income-type" class="form-label">Income Type</label>
            <select id="income-type" name="income_type" class="form-select" required>
                <option value="" selected disabled>Select Type</option>
                <option value="Sales">Sales</option>
                <option value="Service">Service</option>
                <option value="Investment">Investment</option>
                <option value="Other">Other</option>
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