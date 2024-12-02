@extends('layouts.default')
@section('title')
Expense List
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Expense Records</h4>
        <a href="{{ route('expences.add')}}" class="btn btn-primary">+ Add Expense</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Expense Date</th>
                <th>Category</th>
                <th>Amount (Rs)</th>
                <th>Payment Method</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>2024-11-25</td>
                <td>Rent</td>
                <td>₹15,000</td>
                <td>Bank Transfer</td>
                <td>Office rent for November</td>
            </tr>
            <!-- Add more rows dynamically -->
        </tbody>
    </table>
</div>


@endsection


