@extends('layouts.default')
@section('title')
    Pending Task
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Pending TPM Tasks</h4>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Task ID</th>
                <th>Task Name</th>
                <th>Machine</th>
                <th>Assigned To</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr>
                <td>TPM001</td>
                <td>Lubricate Bearings</td>
                <td>CNC Machine 1</td>
                <td>Rahul Verma</td>
                <td>2024-11-30</td>
                <td>Pending</td>
                <td>High</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-success btn-sm">Mark Complete</button>
                </td>
            </tr>
            <tr>
                <td>TPM002</td>
                <td>Replace Conveyor Belt</td>
                <td>Packaging Machine</td>
                <td>Anil Kapoor</td>
                <td>2024-12-02</td>
                <td>Pending</td>
                <td>Medium</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-success btn-sm">Mark Complete</button>
                </td>
            </tr>
            <tr>
                <td>TPM003</td>
                <td>Check Electrical Panel</td>
                <td>Injection Molding Machine</td>
                <td>Priya Desai</td>
                <td>2024-11-28</td>
                <td>Pending</td>
                <td>Low</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-warning btn-sm">Edit</button>
                    <button class="btn btn-success btn-sm">Mark Complete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
