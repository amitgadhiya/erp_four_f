@extends('layouts.default')
@section('title')
    Add Gate Entery Item
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('gateEntryItem',request('id'))}}" class="btn btn-link">< Back</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12">
        <form action="{{route('gateEntryItemAddPost',request('id'))}}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    
                    
                    <div class="form-group">
                        <label for="">Item</label>
                        <select required class="form-select select2" name="gei_item_id" id="gei_item_id"> 
                            <option value="">Select</option>
                            @foreach ($items as $item)
                            <option value="{{$item->item_id}}">{{$item->item_name}}</option> 
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Tax</label>
                        <select  class="form-select " name="gei_tax_id" id="gei_tax_id">
                            <option value="">Select</option>
                            @foreach ($taxes as $tax)
                            <option value="{{$tax->tax_id}}">{{$tax->tax_name}}</option>
                            @endforeach
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Rate</label>
                        <input  id="gei_rate" name="gei_rate" class="form-control" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Quntity</label>
                        <input required id="gei_qty" name="gei_qty" class="form-control" type="text">
                    </div>
                    
                    <input type="submit" value="Save" class="btn btn-success">
                </div>
            </div>
            
        </form>
    </div>
</div>
@endsection
