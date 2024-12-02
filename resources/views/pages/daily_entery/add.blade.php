@extends('layouts.default')
@section('title')
    Daily Data Entery Add
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="" method="post" class="form-group">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" id="date" name="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="employees" class="form-label">No of employees present today</label>
                            <input type="text" id="employees" name="employees" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
@endsection