@extends('layouts.default')
@section('title')
    Genrate Salary
@endsection
@section('content')
<div class="container mt-4">
    <h4>Generated Salary List</h4>
    <a href="{{ route('salary.add')}}" class="btn btn-primary">+ Genrate Salary</a>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Employee Name</th>
                <th>Month</th>
                <th>Basic Salary (Rs)</th>
                <th>HRA (Rs)</th>
                <th>Other Allowances (Rs)</th>
                <th>Deductions (Rs)</th>
                <th>Net Salary (Rs)</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr>
                <td>Amit Sharma</td>
                <td>November</td>
                <td>50,000</td>
                <td>10,000</td>
                <td>5,000</td>
                <td>2,000</td>
                <td>63,000</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Priya Desai</td>
                <td>November</td>
                <td>45,000</td>
                <td>8,000</td>
                <td>4,000</td>
                <td>3,000</td>
                <td>54,000</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
