@extends('layouts.default')
@section('title')
    In-Ward List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="container mt-4 text-right">
            <a class="btn btn-primary" href="{{ route('in-ward.add')}}">Add Inward</a>
        </div>
        <div class="container mt-4">
            <h4>Inward Records</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Inward No</th>
                        <th>Supplier Name</th>
                        <th>Material</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Received By</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr>
                        <td>2024-11-25</td>
                        <td>IN12345</td>
                        <td>ABC Suppliers</td>
                        <td>Steel Rods</td>
                        <td>100</td>
                        <td>Kg</td>
                        <td>John Doe</td>
                        <td>Checked and verified</td>
                    </tr>
                    <!-- Add more rows dynamically as needed -->
                </tbody>
            </table>
        </div>
        
    </div>
</div>
@endsection


