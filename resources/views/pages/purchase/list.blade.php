@extends('layouts.default')
@section('title')
    Purchase List
@endsection
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
        <h4>Purchase Records</h4>
        <a href="{{ route('purchase.add')}}" class="btn btn-primary">+ Add Purchase</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Purchase Date</th>
                <th>Purchase Order No</th>
                <th>Supplier Name</th>
                <th>Material</th>
                <th>Quantity</th>
                <th>Unit</th>
                <th>Total Cost</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>2024-11-25</td>
                <td>PO12345</td>
                <td>ABC Supplies</td>
                <td>Steel Plates</td>
                <td>300</td>
                <td>Kg</td>
                <td>10,000</td>
                <td>Delivered on time</td>
            </tr>
            <!-- Add more rows dynamically -->
        </tbody>
    </table>
</div>

@endsection


