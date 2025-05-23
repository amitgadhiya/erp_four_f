@extends('layouts.default')
@section('title')
    Follow-Up Add
@endsection
@section('content')

<div class="container mt-5">
    
    <form action="{{route('followupAddPost',['id'=>request('id')])}}" method="post">
        @csrf
        <!-- Current Date -->
        <div class="row">
            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" class="form-control" id="fu_done_date" name="fu_done_date" required value="{{date("Y-m-d")}}">
                </div>
        
                <!-- Next Follow-Up Date -->
                <div class="mb-3">
                    <label for="nextFollowUpDate" class="form-label">Next Follow-Up Date</label>
                    <input type="date" class="form-control" id="fu_do_date" name="fu_do_date" required value="">
                </div>
        
                <!-- Discussion Details -->
                <div class="mb-3">
                    <label for="discussion" class="form-label">What was discussed?</label>
                    <textarea class="form-control" id="fu_remark" name="fu_remark" rows="4" required></textarea>
                </div>
        
                <!-- With Whom -->
                <div class="mb-3">
                    <label for="withWhom" class="form-label">With Whom?</label>
                    <input type="text" class="form-control" id="fu_with" name="fu_with" required>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-3">
                <button type="submit" class="btn btn-primary">Save Follow-Up</button>
            </div>
        </div>
        
    </form>
</div>
@endsection