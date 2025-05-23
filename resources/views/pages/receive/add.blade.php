@extends('layouts.default')
@section('title')
    Receive Item
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <form action="#" method="POST">
            <!-- CSRF Token -->
            @csrf

            <!-- Recipient Name -->
            <div class="form-group">
                <label for="recipient">Item Name</label>
                <select name="item" id="item" class="form-control">
                    <option value=""></option>
                    <option value="">Item 1</option>
                    <option value="">Item 2</option>
                    <option value="">Item 3</option>
                    <option value="">Item 4</option>
                </select>
            </div>
            

            <!-- Recipient Name -->
            <div class="form-group">
                <label for="recipient">Recipient Name</label>
                <select name="item" id="item" class="form-control">
                    <option value=""></option>
                    <option value="">User 1</option>
                    <option value="">User 2</option>
                    <option value="">User 3</option>
                    <option value="">User 4</option>
                </select>
            </div>

            <!-- Recipient Name -->
            <div class="form-group">
                <label for="recipient">Reason</label>
                <select name="item" id="item" class="form-control">
                    <option value=""></option>
                    <option value="">Reason 1</option>
                    <option value="">Reason 2</option>
                    <option value="">Reason 3</option>
                    <option value="">Reason 4</option>
                </select>
            </div>

            <!-- Remarks -->
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter remarks (optional)"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
</div>



@endsection
