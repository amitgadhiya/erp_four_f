@extends('layouts.default')
@section('title')
    Add Inward Returnable DC
@endsection
@section('content')
<form action="{{ route('dcirAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Date</label>
                <input type="date" class="form-control" id="dcir_date" name="dcir_date" required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">DC Number</label>
                <input type="text" class="form-control" id="dcir_number" name="dcir_number" readonly required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Party</label>
                <select name="dcir_party_id" id="dcir_party_id" required class="form-select">
                    <option value="">Select</option>
                    @foreach ($parties as $party)
                    <option value="{{ $party->party_id }}">{{$party->party_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Remark</label>
                <textarea class="form-control" name="dcir_remark" id="dcir_remark" cols="30" rows="10"></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Add </button>
            <a href="{{ route('dcir') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection