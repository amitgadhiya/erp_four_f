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
                
                <th>Total Amount (Rs)</th>
                <th>Remarks</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>2024-11-25</td>
                <td>INV98765</td>
                <td>XYZ Traders</td>
                
                <td>₹25,000</td>
                <td>Delivered on time</td>
                <td>
                    <a href="{{route('sales.edit')}}">Edit</a> | 
                    <a href="{{route('sales.manage')}}">Manage</a>
                </td>
            </tr>
            <!-- Add more rows dynamically -->
        </tbody>
    </table>
</div>


@endsection


