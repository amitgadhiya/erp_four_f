@extends('layouts.default')
@section('title')
    Sales List
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Sales Records</h4>
        <a href="{{ route('sales.add')}}" class="btn btn-primary">+ Add Sale</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Sales Date</th>
                <th>Invoice No</th>
                <th>Customer Name</th>
                <th>Material</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Total Amount (Rs)</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>2024-11-25</td>
                <td>INV98765</td>
                <td>XYZ Traders</td>
                <td>Steel Rods</td>
                <td>500</td>
                <td>Kg</td>
                <td>₹25,000</td>
                <td>Delivered on time</td>
            </tr>
            <!-- Add more rows dynamically -->
        </tbody>
    </table>
</div>


@endsection


