@extends('layouts.default')
@section('title')
    Leave Application Add
@endsection
@section('content')
<div id="add-leave-form" class="container mt-4">
    <h4>Add Leave Application</h4>
    <form action="" method="post" class="form-group">
        {{-- <div class="mb-3">
            <label for="employee-name" class="form-label">Employee Name</label>
            <select id="employee-name" name="employee_name" class="form-select" required>
                <option value="" selected disabled>Select Employee</option>
                <option value="Rahul Verma">Rahul Verma</option>
                <option value="Anil Kapoor">Anil Kapoor</option>
                <option value="Priya Desai">Priya Desai</option>
                <option value="Amit Sharma">Amit Sharma</option>
            </select>
        </div> --}}
        <div class="mb-3">
            <label for="leave-type" class="form-label">Leave Type</label>
            <select id="leave-type" name="leave_type" class="form-select" required>
                <option value="" selected disabled>Select Leave Type</option>
                <option value="Sick Leave">Sick Leave</option>
                <option value="Casual Leave">Casual Leave</option>
                <option value="Annual Leave">Annual Leave</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="start-date" class="form-label">Start Date</label>
            <input type="date" id="start-date" name="start_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="end-date" class="form-label">End Date</label>
            <input type="date" id="end-date" name="end_date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="reason" class="form-label">Reason</label>
            <textarea id="reason" name="reason" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit Leave Application</button>
    </form>
</div>
@endsection
