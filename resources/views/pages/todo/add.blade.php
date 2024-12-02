@extends('layouts.default')
@section('title')
Add Todo
@endsection
@section('content')
<div class="container mt-4">
    <h4>To-Do List Form</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="task-title" class="form-label">Task Title</label>
            <input type="text" id="task-title" name="task_title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="task-details" class="form-label">Task Details</label>
            <textarea id="task-details" name="task_details" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="assigned-to" class="form-label">Assign to</label>
            <select id="assigned-to" name="assigned_to" class="form-select" required>
                <option value="" selected disabled>Select Employee</option>
                <option value="Amit Sharma">Amit Sharma</option>
                <option value="Priya Desai">Priya Desai</option>
                <option value="Rahul Verma">Rahul Verma</option>
                <option value="Sneha Iyer">Sneha Iyer</option>
                <option value="Anil Kapoor">Anil Kapoor</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select id="priority" name="priority" class="form-select" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="due-date" class="form-label">Due Date</label>
            <input type="date" id="due-date" name="due_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
</div>


@endsection