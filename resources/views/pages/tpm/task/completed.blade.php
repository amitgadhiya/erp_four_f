@extends('layouts.default')
@section('title')
    Completed Task
@endsection
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Completed TPM Tasks</h4>
    </div>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Task ID</th>
                <th>Task Name</th>
                <th>Machine</th>
                <th>Assigned To</th>
                <th>Completion Date</th>
                <th>Priority</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr>
                <td>TPM010</td>
                <td>Replace Hydraulic Oil</td>
                <td>Lathe Machine</td>
                <td>Amit Sharma</td>
                <td>2024-11-24</td>
                <td>High</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-secondary btn-sm">Archive</button>
                </td>
            </tr>
            <tr>
                <td>TPM011</td>
                <td>Inspect Cooling System</td>
                <td>Drill Press</td>
                <td>Anita Reddy</td>
                <td>2024-11-22</td>
                <td>Medium</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-secondary btn-sm">Archive</button>
                </td>
            </tr>
            <tr>
                <td>TPM012</td>
                <td>Tighten Bolts and Screws</td>
                <td>Milling Machine</td>
                <td>Vikram Patel</td>
                <td>2024-11-20</td>
                <td>Low</td>
                <td>
                    <button class="btn btn-info btn-sm">View</button>
                    <button class="btn btn-secondary btn-sm">Archive</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
