@extends('layouts.default')

@section('title')
    Add Inward Returnable DC
@endsection

@section('content')
    
    <div class="row mt-3">
        <div class="col-lg-12 ">
            <form method="POST">
                @csrf
                <div class="row ">
                    <div class="col-lg-3 ">
                        <div class="form-group mb-3">
                            <label for="dc_date">Item Name</label>
                            <input type="text" class="form-control" id="dc_date" name="dc_date" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="dc_no">Qty</label>
                            <input type="text" class="form-control" id="dc_no" name="dc_no" required>
                        </div>
                        
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('in-r-dc.list') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
