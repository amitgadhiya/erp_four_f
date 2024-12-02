@extends('layouts.default')
@section('title')
    Stock List
@endsection
@section('content')
<div class="container mt-4">
    <h4>Stock Records</h4>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Material</th>
                <th>Stock ID</th>
                <th>Quantity Available</th>
                <th>Unit</th>
                <th>Last Inward Date</th>
                <th>Last Outward Date</th>
                <th>Status</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>Steel Rods</td>
                <td>STK001</td>
                <td>500</td>
                <td>Kg</td>
                <td>2024-11-20</td>
                <td>2024-11-24</td>
                <td>Available</td>
                <td>In good condition</td>
            </tr>
            <!-- Add more rows dynamically as needed -->
        </tbody>
    </table>
</div>

@endsection


