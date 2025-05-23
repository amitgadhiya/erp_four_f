@extends('layouts.default')
@section('title')
    Edit Inward Non Returnable DC
@endsection
@section('content')
<form action="{{ route('dcinrAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Date</label>
                <input type="date" class="form-control" id="dcinr_date" name="dcinr_date" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">DC Number</label>
                <input type="text" class="form-control" id="dcinr_number" name="dcinr_number" readonly required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Party</label>
                <select name="dcinr_party_id" id="dcinr_party_id" required class="form-select">
                    <option value="">Select</option>
                    @foreach ($parties as $party)
                    <option value="{{ $party->party_id }}">{{$party->party_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Remark</label>
                <textarea class="form-control" name="dcinr_remark" id="dcinr_remark" cols="30" rows="10"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update </button>
            <a href="{{ route('dcinr') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection