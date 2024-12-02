@extends('layouts.default')
@section('title')
    Schedule Task List
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Scheduled TPM Tasks</h4>
        <a href="{{ route('schedule-task.add')}}" class="btn btn-primary">+ Schedule Task</a>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Task ID</th>
                <th>Task Name</th>
                <th>Machine</th>
                <th>Assigned To</th>
                <th>Scheduled Date</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr>
                <td>TPM013</td>
                <td>Clean Air Filters</td>
                <td>CNC Machine 2</td>
                <td>Rahul Verma</td>
                <td>2024-12-05</td>
                <td>High</td>
                <td>Scheduled</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Cancel</button>
                </td>
            </tr>
            <tr>
                <td>TPM014</td>
                <td>Replace Filter Cartridge</td>
                <td>Injection Molding</td>
                <td>Anil Kapoor</td>
                <td>2024-12-10</td>
                <td>Medium</td>
                <td>Scheduled</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Cancel</button>
                </td>
            </tr>
            <tr>
                <td>TPM015</td>
                <td>Inspect Hydraulic System</td>
                <td>Packaging Machine</td>
                <td>Priya Desai</td>
                <td>2024-12-08</td>
                <td>Low</td>
                <td>Scheduled</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-danger btn-sm">Cancel</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
