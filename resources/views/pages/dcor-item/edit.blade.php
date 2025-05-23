@extends('layouts.default')
@section('title')
    Edit Outward returnable DC Item
@endsection
@section('content')
<form action="{{ route('dcorItemEditPost',['id'=>request('id'),'pid'=>request('pid')]) }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-3">
            
            
            <div class="mb-3">
                <label for="name" class="form-label">Item</label>
                <select name="dcori_item_id" id="dcori_item_id" required class="form-select select2">
                    <option value="{{ $dci->item->item_id }}">{{ $dci->item->item_name }}</option>
                    @foreach ($items as $item)
                    <option value="{{ $item->item_id }}">{{$item->item_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Quantity</label>
                <input type="text" class="form-control" id="dcori_qty" name="dcori_qty"  required value="{{ $dci->dcori_qty }}" >
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Remark</label>
                <textarea class="form-control" name="dcori_remark" id="dcori_remark" cols="30" rows="10">{{ $dci->dcori_remark }}</textarea>
                
            </div>
            
            
            <button type="submit" class="btn btn-primary">Update </button>
            <a href="{{ route('dcorItem',request('id')) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection