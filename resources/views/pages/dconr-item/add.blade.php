@extends('layouts.default')
@section('title')
    Add Outward non returnable DC Items
@endsection
@section('content')
<form action="{{ route('dconrItemAddPost',['id'=>request('id')]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            
            
            <div class="mb-3">
                <label for="name" class="form-label">Item</label>
                <select name="dconri_item_id" id="dconri_item_id" required class="form-select select2">
                    <option value="">Select</option>
                    @foreach ($items as $item)
                    <option value="{{ $item->item_id }}">{{$item->item_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="dconri_qty" name="dconri_qty"  required >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Remark</label>
                <textarea class="form-control" name="dconri_remark" id="dconri_remark" cols="30" rows="10"></textarea>
                
            </div>
            
            
            <button type="submit" class="btn btn-primary">Add </button>
            <a href="{{ route('dconrItem',request('id')) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection