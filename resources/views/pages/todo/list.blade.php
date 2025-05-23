@extends('layouts.default')
@section('title')
Todo List
@endsection
@section('content')
<div class="container mt-5">
    <!-- Nav Tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">ToDo</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">Daily Plan</button>
      </li>
    </ul>
  
    <!-- Tab Content -->
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
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
                            <button class="btn btn-info btn-sm">Todays Plan</button>
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
                            <button class="btn btn-info btn-sm">Todays Plan</button>
                            <button class="btn btn-success btn-sm">Mark as Done</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
      </div>
      <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
        <div class="container mt-4">
            <h4>Daily Plan</h4>
            
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
      </div>
    </div>
  </div>




@endsection


