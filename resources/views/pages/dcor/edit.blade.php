@extends('layouts.default')
@section('title')
    Edit Outward Returnable DC
@endsection
@section('content')
<form action="{{ route('dcorEditPost',request('id')) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Date</label>
                <input type="date" class="form-control" id="dcor_date" name="dcor_date" required value="{{ $dc->dcor_date }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">DC Number</label>
                <input type="text" class="form-control" id="dcor_number" name="dcor_number" readonly required value="{{ $dc->dcor_number }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Party</label>
                <select name="dcor_party_id" id="dcor_party_id" required class="form-select">
                    <option value="{{ $dc->party->party_id }}">{{ $dc->party->party_name }}</option>
                    @foreach ($parties as $party)
                    <option value="{{ $party->party_id }}">{{$party->party_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Remark</label>
                <textarea class="form-control" name="dcor_remark" id="dcor_remark" cols="30" rows="10">{{ $dc->dcor_remark }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update </button>
            <a href="{{ route('dcor') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection