@extends('layouts.default')
@section('title')
    Edit User
@endsection
@section('content')
<form action="{{ route('user.edit.post') }}" method="POST">
    @csrf
<div class="row">
    <div class="col-lg-3">
       
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Add User</button>
            <a href="{{ route('user.list') }}" class="btn btn-secondary">Cancel</a>
        
    </div>
</div>
</form>
@endsection
@section('script')

@endsection