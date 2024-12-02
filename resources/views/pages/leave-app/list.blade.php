@extends('layouts.default')
@section('title')
    Leave Application List
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Leave Application List</h4>
        <a href="{{ route('leave-app.add')}}" class="btn btn-primary">+ Add Leave Application</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Employee Name</th>
                <th>Leave Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Reason</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr>
                <td>Rahul Verma</td>
                <td>Sick Leave</td>
                <td>2024-11-20</td>
                <td>2024-11-22</td>
                <td>Fever</td>
                <td>Approved</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Anil Kapoor</td>
                <td>Casual Leave</td>
                <td>2024-11-18</td>
                <td>2024-11-19</td>
                <td>Personal Work</td>
                <td>Pending</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
