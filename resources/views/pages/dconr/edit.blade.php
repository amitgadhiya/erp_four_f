@extends('layouts.default')
@section('title')
    Edit Outward Non Returnable DC
@endsection
@section('content')
<form action="{{ route('dconrEditPost',request('id')) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label for="name" class="form-label">Date</label>
                <input type="date" class="form-control" id="dconr_date" name="dconr_date" required value="{{ $dc->dconr_date }}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">DC Number</label>
                <input type="text" class="form-control" id="dconr_number" name="dconr_number" value="{{ $dc->dconr_number }}" readonly required>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Party</label>
                <select name="dconr_party_id" id="dconr_party_id" required class="form-select">
                    <option value="{{ $dc->party->party_id }}">{{ $dc->party->party_name }}</option>
                    @foreach ($parties as $party)
                    <option value="{{ $party->party_id }}">{{$party->party_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Remark</label>
                <textarea class="form-control" name="dconr_remark" id="dconr_remark" cols="30" rows="10">{{ $dc->dconr_remark }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Update </button>
            <a href="{{ route('dconr') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection