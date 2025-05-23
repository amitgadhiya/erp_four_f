@extends('layouts.default')
@section('title')
    Edit Employee
@endsection
@section('content')
<form action="{{ route('empEditPost',['id'=>$emp->emp_id]) }}" method="POST">
    @csrf
<div class="row">
    <div class="col-lg-3">
       
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{$emp->emp_name}}" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Emp Code</label>
                <input type="text" class="form-control" value="{{$emp->emp_code}}" id="code" name="code" required >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="{{$emp->emp_email}}" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="tel" class="form-control" value="{{$emp->emp_mobile}}" id="mobile" name="mobile" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Department</label>
                <select class="form-control" id="dept" name="dept" required>
                    <option value="{{$emp->dept->dept_id}}">{{$emp->dept->dept_name}}</option>
                    @foreach ($depts as $dept)
                    <option value="{{$dept->dept_id}}">{{$dept->dept_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <input type="checkbox" id="loginAllowed" 
                 name="loginAllowed" onchange="togglePasswordField()" {{ $emp->emp_login_allowed =="yes" ? 'checked' : '' }}> 
                <label for="loginAllowed">Login Allowed</label>
            </div>
            
            <div class="mb-3" style="display: {{ $emp->emp_login_allowed =="yes" ? 'block' : 'none' }};" id="passwordField" style="display: none;">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
        
    </div>
</div>
<button type="submit" class="btn btn-primary">Update Employee</button>
            <a href="{{ route('emp') }}" class="btn btn-secondary">Cancel</a>
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