@extends('layouts.default')
@section('title')
    Genrate Salary
@endsection
@section('content')
<div class="container mt-4">
    <h4>Generate Salary Form</h4>
    <form action="" method="post" class="form-group">
        <div class="mb-3">
            <label for="employee-name" class="form-label">Employee Name</label>
            <select id="employee-name" name="employee_name" class="form-select" required>
                <option value="" selected disabled>Select Employee</option>
                <option value="Amit Sharma">Amit Sharma</option>
                <option value="Priya Desai">Priya Desai</option>
                <option value="Rahul Verma">Rahul Verma</option>
                <option value="Sneha Iyer">Sneha Iyer</option>
                <option value="Anil Kapoor">Anil Kapoor</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="month" class="form-label">Month</label>
            <select id="month" name="month" class="form-select" required>
                <option value="" selected disabled>Select Month</option>
                <option value="January">January</option>
                <option value="February">February</option>
                <option value="March">March</option>
                <option value="April">April</option>
                <option value="May">May</option>
                <option value="June">June</option>
                <option value="July">July</option>
                <option value="August">August</option>
                <option value="September">September</option>
                <option value="October">October</option>
                <option value="November">November</option>
                <option value="December">December</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="basic-salary" class="form-label">Present Days</label>
            <input type="number" id="basic-salary" name="basic_salary" class="form-control" required>
        </div>

        

        
        <button type="submit" class="btn btn-success">Generate Salary</button>
    </form>
</div>
@endsection