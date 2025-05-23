@extends('layouts.default')

@section('title')
    Edit Project
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{ route('projectEditPost', $project->pro_id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="pro_number">Project No:</label>
                        <input type="text" class="form-control" id="pro_number" name="pro_number" value="{{ $project->pro_number }}" readonly required>
                    </div>

                    

                    <div class="form-group">
                        <label for="pro_name">Project Name:</label>
                        <input type="text" class="form-control" id="pro_name" name="pro_name" value="{{ $project->pro_name }}"  required>
                    </div>

                    <div class="form-group">
                        <label for="pro_desc">Project Description:</label>
                        <textarea class="form-control" name="pro_desc" id="pro_desc" rows="5">{{ $project->pro_desc }}</textarea>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="pro_end_date">Project End Date:</label>
                        <input type="date" class="form-control" id="pro_end_date" name="pro_end_date" value="{{ $project->pro_end_date }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pro_po_date">PO Date:</label>
                        <input type="date" class="form-control" id="pro_po_date" name="pro_po_date" value="{{ $project->pro_po_date }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pro_po_number">PO Number:</label>
                        <input type="text" class="form-control" id="pro_po_number" name="pro_po_number" value="{{ $project->pro_po_number }}" required>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="pro_input">Input Status:</label>
                        <select name="pro_input" class="form-control" required>
                            <option disabled>Select</option>
                            <option value="Pending" {{ $project->pro_input == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Complete" {{ $project->pro_input == 'Complete' ? 'selected' : '' }}>Complete</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pro_dap">DAP Status:</label>
                        <select name="pro_dap" class="form-control" required>
                            <option disabled>Select</option>
                            <option value="Load" {{ $project->pro_dap == 'Load' ? 'selected' : '' }}>Load</option>
                            <option value="Inprocess" {{ $project->pro_dap == 'Inprocess' ? 'selected' : '' }}>Inprocess</option>
                            <option value="Complete" {{ $project->pro_dap == 'Complete' ? 'selected' : '' }}>Complete</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pro_dap_app">DAP Approval:</label>
                        <select name="pro_dap_app" class="form-control" required>
                            <option disabled>Select</option>
                            <option value="Pending" {{ $project->pro_dap_app == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Received" {{ $project->pro_dap_app == 'Received' ? 'selected' : '' }}>Received</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pro_final">Final Status:</label>
                        <select name="pro_final" class="form-control" required>
                            <option disabled>Select</option>
                            <option value="Load" {{ $project->pro_final == 'Load' ? 'selected' : '' }}>Load</option>
                            <option value="Inprocess" {{ $project->pro_final == 'Inprocess' ? 'selected' : '' }}>Inprocess</option>
                            <option value="Complete" {{ $project->pro_final == 'Complete' ? 'selected' : '' }}>Complete</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="pro_rate">Rate:</label>
                        <input type="number" class="form-control" name="pro_rate" value="{{ $project->pro_rate }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pro_qty">Quantity:</label>
                        <input type="number" class="form-control" name="pro_qty" value="{{ $project->pro_qty }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pro_discount">Discount:</label>
                        <input type="number" class="form-control" name="pro_discount" value="{{ $project->pro_discount }}" required>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary">Update Project</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
