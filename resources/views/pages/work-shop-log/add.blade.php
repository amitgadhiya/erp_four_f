@extends('layouts.default')

@section('title')
    Add Work Log
@endsection

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-lg-12">
            <form action="" method="">
                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="user" class="form-label">Project Number</label>
                            <select class="form-select" id="project" name="project" required>
                                <option value="" disabled selected>Select Project</option>
                                <option value="P-001">P-001</option>
                                <option value="P-002">P-002</option>
                                <option value="P-003">P-003</option>
                                <option value="P-004">P-004</option>
                                <option value="P-005">P-005</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="work_category" class="form-label">Work Category</label>
                            <select class="form-select" id="work_category" name="work_category" required>
                                <option value="" disabled selected>Select category</option>
                                <option value="Design">Cutting</option>
                                <option value="Development">Hardning</option>
                                <option value="Testing">Blacking</option>
                                <option value="Review">Granding</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="work_category" class="form-label">Elements</label>
                            <select class="form-select" id="work_category" name="work_category" multiple required>
                                <option value="" disabled selected>Select Elements</option>
                                <option value="Design">01-01</option>
                                <option value="Development">01-02</option>
                                <option value="Testing">02-01</option>
                                <option value="Review">02-02</option>
                                <option value="Other">03-01</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="work_desc" class="form-label">Work Description</label>
                            <textarea class="form-control" id="work_desc" name="work_desc" rows="3" placeholder="Enter work description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="start_time" class="form-label">Start Time</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required>
                        </div>
                      
                    </div>
                </div>
                
                <button type="submit" class="btn btn-success">Save Work Log</button>
                <a href="" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
