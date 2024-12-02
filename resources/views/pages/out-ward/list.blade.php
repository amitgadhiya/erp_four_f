@extends('layouts.default')
@section('title')
    Out-Ward List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="container mt-4 text-right">
            <a href="{{ route('out-ward.add')}}" class="btn btn-primary ">Add Outward</a>

        </div>
        <div class="container mt-4">
            <h4>Outward Records</h4>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Date</th>
                        <th>Outward No</th>
                        <th>Customer Name</th>
                        <th>Material</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Delivered By</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Row -->
                    <tr>
                        <td>2024-11-25</td>
                        <td>OUT67890</td>
                        <td>XYZ Industries</td>
                        <td>Aluminum Sheets</td>
                        <td>200</td>
                        <td>Kg</td>
                        <td>Jane Smith</td>
                        <td>Delivered on schedule</td>
                    </tr>
                    <!-- Add more rows dynamically as needed -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


