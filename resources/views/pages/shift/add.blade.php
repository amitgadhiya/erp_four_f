@extends('layouts.default')
@section('title')
    Shift Add
@endsection
@section('content')
<div id="add-shift-form" class="container mt-4">
    <h4>Add New Shift</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="shift-name" class="form-label">Shift Name</label>
            <input type="text" id="shift-name" name="shift_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="start-time" class="form-label">Start Time</label>
            <input type="time" id="start-time" name="start_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="end-time" class="form-label">End Time</label>
            <input type="time" id="end-time" name="end_time" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="supervisor" class="form-label">Assigned Supervisor</label>
            <select id="supervisor" name="supervisor" class="form-select" required>
                <option value="" selected disabled>Select Supervisor</option>
                <option value="Rahul Verma">Rahul Verma</option>
                <option value="Anil Kapoor">Anil Kapoor</option>
                <option value="Priya Desai">Priya Desai</option>
                <option value="Amit Sharma">Amit Sharma</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Add Shift</button>
    </form>
</div>
@endsection
