@extends('layouts.default')
@section('title')
Todo List
@endsection
@section('content')
<div class="container mt-4">
    <h4>To-Do List</h4>
    <a href="{{ route('todo.add')}}" class="btn btn-primary">+ Add ToDo</a>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Task Title</th>
                <th>Details</th>
                <th>Assigned To</th>
                <th>Priority</th>
                <th>Due Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Row -->
            <tr>
                <td>Prepare Budget Report</td>
                <td>Quarterly financial report</td>
                <td>Amit Sharma</td>
                <td>High</td>
                <td>2024-11-30</td>
                <td>Pending</td>
                <td>
                    <button class="btn btn-success btn-sm">Mark as Done</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Organize Team Meeting</td>
                <td>Discuss project roadmap</td>
                <td>Priya Desai</td>
                <td>Medium</td>
                <td>2024-12-05</td>
                <td>Pending</td>
                <td>
                    <button class="btn btn-success btn-sm">Mark as Done</button>
                    <button class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>



@endsection


