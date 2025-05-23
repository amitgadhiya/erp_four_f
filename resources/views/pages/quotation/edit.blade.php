@extends('layouts.default')
@section('title')
    Edit Quotation
@endsection
@section('content')
<form action="{{ route('quotationEditPost',['id'=>$quot->quot_id]) }}" method="post">
    @csrf
    
    <div class="row">
        
        <div class="col-lg-3">
            
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="quot_date" required value="{{ $quot->quot_date }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Remark</label>
                
                <textarea name="quot_remake" class="form-control" id="quot_remake" cols="30" rows="10">{{ $quot->quot_remake }}</textarea>
            </div>
                    
                
            
        </div>
    </div>
    
    <div class="row mt-3">
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary">Edit Quotation</button>
            <a href="{{ route('quotation') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection