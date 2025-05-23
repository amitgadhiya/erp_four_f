@extends('layouts.default')
@section('title')
    Purchase List
@endsection
@section('content')

<div class="container mt-4">
    
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Purchase Date</th>
                <th>Purchase Order No</th>
                <th>Supplier Name</th>
                
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
                
                <td>10,000</td>
                <td>Delivered on time</td>
            </tr>
            <!-- Add more rows dynamically -->
        </tbody>
    </table>
</div>

@endsection


