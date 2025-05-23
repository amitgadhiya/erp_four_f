@extends('layouts.default')
@section('title')
    Add Employee
@endsection
@section('content')
<form action="{{ route('empAddPost') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-lg-3">
       
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" value="" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Emp Code</label>
            <input type="text" class="form-control" value="" id="code" name="code" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" value="" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="mobile" class="form-label">Mobile</label>
            <input type="tel" class="form-control" value="" id="mobile" name="mobile" required>
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Department</label>
            <select class="form-control" id="dept" name="dept" required>
                <option value="">Select</option>
                @foreach ($depts as $dept)
                <option value="{{$dept->dept_id}}">{{$dept->dept_name}}</option>
                @endforeach
            </select>
        </div>
            <div class="mb-3">
                <input type="checkbox" id="loginAllowed" 
                 name="loginAllowed" onchange="togglePasswordField()"> 
                <label for="loginAllowed">Login Allowed</label>
            </div>
            
            <div class="mb-3" id="passwordField" style="display: none;">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Add Employee</button>
            <a href="{{ route('emp') }}" class="btn btn-secondary">Cancel</a>
        
    </div>
</div>
</form>
@endsection
@section('script')
<script>
    function togglePasswordField() {
        var checkbox = document.getElementById("loginAllowed");
        var passwordField = document.getElementById("passwordField");
    
        if (checkbox.checked) {
            passwordField.style.display = "block";
            document.getElementById("password").setAttribute("required", "true");
        } else {
            passwordField.style.display = "none";
            document.getElementById("password").removeAttribute("required");
        }
    }
    </script>
@endsection