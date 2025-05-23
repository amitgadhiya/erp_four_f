@extends('layouts.default')
@section('title')
    Add Gate Entery
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{route('gateEntryAddPost')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="">Gate Entry No</label>
                        <input id="ge_number" name="ge_number" required class="form-control" type="text" value="{{$gate_entry_no}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Date</label>
                        <input id="ge_date" name="ge_date" required class="form-control" type="date" value="{{date('Y-m-d')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Party</label>
                        <select required class="form-select select2" name="ge_party_id" id="ge_party_id">
                            <option value="">Select</option>
                            @foreach ($parties as $party)
                            <option value="{{$party->party_id}}">{{$party->party_name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Reference Doc</label>
                        <select required class="form-select" name="ge_ref_type" id="ge_ref_type">
                            <option value="">Select</option>
                            
                            <option value="Invoice">Invoice</option>
                            <option value="Inward non returnable DC">Inward non returnable DC </option>
                            <option value="Inward returnable DC">Inward returnable DC </option>
                            
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Reference No</label>
                        <input required id="ge_ref_number" name="ge_ref_number" class="form-control" type="text">
                    </div>
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
