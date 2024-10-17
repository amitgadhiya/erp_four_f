@extends('layouts.default')
@section('title')
    List User
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('user.add') }}" class="btn btn-primary">Add User</a>
    </div>
</div>
<div class="table-responsive mt-3">
<table id="userTable" class="display">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @php
            $users = [
                (object) [
                    'id' => 1,
                    'name' => 'User 1',
                    'email' => 'user1@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 2,
                    'name' => 'User 2',
                    'email' => 'user2@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 3,
                    'name' => 'User 3',
                    'email' => 'user3@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 4,
                    'name' => 'User 4',
                    'email' => 'user4@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 5,
                    'name' => 'User 5',
                    'email' => 'user5@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 6,
                    'name' => 'User 6',
                    'email' => 'user6@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 7,
                    'name' => 'User 7',
                    'email' => 'user7@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 8,
                    'name' => 'User 8',
                    'email' => 'user8@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 9,
                    'name' => 'User 9',
                    'email' => 'user9@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 10,
                    'name' => 'User 10',
                    'email' => 'user10@example.com',
                    'role' => 'user',
                ],
                (object) [
                    'id' => 11,
                    'name' => 'Admin User',
                    'email' => 'admin@example.com',
                    'role' => 'admin',
                ],
            ];
        @endphp
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#userTable').DataTable({
            // You can customize the DataTable options here
            responsive: true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endsection