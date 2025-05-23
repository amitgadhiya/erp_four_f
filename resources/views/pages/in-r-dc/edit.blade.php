@extends('layouts.default')

@section('title')
    Edit Inward Returnable DC
@endsection

@section('content')
    
    <div class="row mt-3">
        <div class="col-lg-12 ">
            <form method="POST">
                @csrf
                <div class="row ">
                    <div class="col-lg-3 ">
                        <div class="form-group mb-3">
                            <label for="dc_date">DC Date (Customer)</label>
                            <input type="date" class="form-control" id="dc_date" name="dc_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dc_no">DC No (Customer)</label>
                            <input type="text" class="form-control" id="dc_no" name="dc_no" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="customer_name">Customer Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="reason">Reason</label>
                            <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="Open">Open</option>
                                <option value="Closed">Closed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('in-r-dc.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
