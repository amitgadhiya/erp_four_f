@extends('layouts.default')
@section('title')
    Schedule Task
@endsection
@section('content')
<!-- Schedule Task Form -->
<div id="schedule-task-form" class="container mt-4">
    <h4>Schedule TPM Task</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="task-name" class="form-label">Task Name</label>
            <select id="task-name" name="task_name" class="form-select" required>
                <option value="" selected disabled>Select Task</option>
                <option value="Clean Air Filters">Clean Air Filters</option>
                <option value="Replace Filter Cartridge">Replace Filter Cartridge</option>
                <option value="Inspect Hydraulic System">Inspect Hydraulic System</option>
                <option value="Lubricate Machine Parts">Lubricate Machine Parts</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="machine" class="form-label">Machine</label>
            <select id="machine" name="machine" class="form-select" required>
                <option value="" selected disabled>Select Machine</option>
                <option value="CNC Machine 1">CNC Machine 1</option>
                <option value="Injection Molding">Injection Molding</option>
                <option value="Packaging Machine">Packaging Machine</option>
                <option value="Lathe Machine">Lathe Machine</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="assigned-to" class="form-label">Assigned To</label>
            <select id="assigned-to" name="assigned_to" class="form-select" required>
                <option value="" selected disabled>Select Employee</option>
                <option value="Rahul Verma">Rahul Verma</option>
                <option value="Anil Kapoor">Anil Kapoor</option>
                <option value="Priya Desai">Priya Desai</option>
                <option value="Vikram Patel">Vikram Patel</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="scheduled-date" class="form-label">Scheduled Date</label>
            <input type="date" id="scheduled-date" name="scheduled_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="priority" class="form-label">Priority</label>
            <select id="priority" name="priority" class="form-select" required>
                <option value="" selected disabled>Select Priority</option>
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Schedule Task</button>
    </form>
</div>
@endsection
