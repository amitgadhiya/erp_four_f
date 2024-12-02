@extends('layouts.default')
@section('title')
    Income List
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Income Records</h4>
        <a href="{{ route('income.add')}}" class="btn btn-primary">+ Add Income</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Income Date</th>
                <th>Source</th>
                <th>Type</th>
                <th>Total Amount (Rs)</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>2024-11-25</td>
                <td>XYZ Traders</td>
                <td>Sales</td>
                <td>₹50,000</td>
                <td>Payment for services</td>
            </tr>
            <!-- Add more rows dynamically -->
        </tbody>
    </table>
</div>



@endsection


