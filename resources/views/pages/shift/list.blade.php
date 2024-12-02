@extends('layouts.default')
@section('title')
    Shift List
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Shift List</h4>
        <a href="{{ route('sales.add')}}" class="btn btn-primary">+ Add Shift</a>
    </div>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Shift Name</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Total Hours</th>
                <th>Assigned Supervisor</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr>
                <td>Morning Shift</td>
                <td>06:00 AM</td>
                <td>02:00 PM</td>
                <td>8 Hours</td>
                <td>Rahul Verma</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Night Shift</td>
                <td>10:00 PM</td>
                <td>06:00 AM</td>
                <td>8 Hours</td>
                <td>Anil Kapoor</td>
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