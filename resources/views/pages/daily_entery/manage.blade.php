@extends('layouts.default')
@section('title')
    Manage Daily Data Entery
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post" class="form-group">
                    <div class="container">
                        <!-- Row for select fields -->
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="operator" class="form-label">Operator Name</label>
                                <select id="operator" name="operator" class="form-select">
                                    <option value="" selected disabled>Select Operator</option>
                                    <option value="operator1">Operator 1</option>
                                    <option value="operator2">Operator 2</option>
                                    <option value="operator3">Operator 3</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="machine" class="form-label">Machine</label>
                                <select id="machine" name="machine" class="form-select">
                                    <option value="" selected disabled>Select Machine</option>
                                    <option value="machine1">Machine 1</option>
                                    <option value="machine2">Machine 2</option>
                                    <option value="machine3">Machine 3</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="project" class="form-label">Project No</label>
                                <select id="project" name="project" class="form-select">
                                    <option value="" selected disabled>Select Project</option>
                                    <option value="project1">Project 1</option>
                                    <option value="project2">Project 2</option>
                                    <option value="project3">Project 3</option>
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label for="elements" class="form-label">Number of Elements</label>
                                <input type="number" id="elements" name="elements" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-3">
                                <label for="start-time" class="form-label">Start Time</label>
                                <input type="time" id="start-time" name="start-time" class="form-control">
                            </div>

                            <div class="col-lg-3">
                                <label for="end-time" class="form-label">End Time</label>
                                <input type="time" id="end-time" name="end-time" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                <label for="total" class="form-label">Total</label>
                                <input type="text" id="total" name="total" class="form-control" readonly>
                            </div>
                            <div class="col-lg-3">
                                
                                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                            </div>

                        </div>
                        
                        
                        
                    </div>
                </form>
                
                
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="container mt-4">
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Operator Name</th>
                                <th>Machine</th>
                                <th>Project No</th>
                                <th>Number of Elements</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example Row -->
                            <tr>
                                <td>Operator 1</td>
                                <td>Machine 1</td>
                                <td>Project 101</td>
                                <td>50</td>
                                <td>08:00 AM</td>
                                <td>10:00 AM</td>
                                <td>2 hours</td>
                            </tr>
                            <!-- Add more rows dynamically as needed -->
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
@endsection