@extends('layouts.default',['__menu' => 'master','__menu_sub' => 'item'])
@section('title')
    Add  Item
@endsection
@section('content')
<form action="{{ route('itemAddPost') }}" method="POST">
    @csrf
    <div class="row">
        <!-- Name -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_name" class="form-label">Item Name</label>
                <input type="text" class="form-control" id="item_name" name="item_name" required>
            </div>
        </div>
        
        
        <!-- Code -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_code" class="form-label">Item Code</label>
                <input type="text" class="form-control" id="item_code" name="item_code" value="{{$set_item_no}}" readonly required>
            </div>
        </div>
        
        
        
        <!-- Category -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_type" class="form-label">Category</label>
                <select class="form-control" id="item_type" name="item_type" required>
                    <option value="" disabled selected>Select Category</option>
                    @foreach ($ics as $ic)
                    <option value="{{$ic->ic_id}}" >{{$ic->ic_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_gst" class="form-label">Tax</label>
                <select class="form-control" id="item_tax_id" name="item_tax_id" required>
                    <option value="" disabled selected>Select Tax</option>
                    @foreach ($taxs as $tax)
                    <option value="{{$tax->tax_id}}">{{$tax->tax_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_gst" class="form-label">HSN Code</label>
                <input type="text" class="form-control" id="item_hsn" name="item_hsn" required>
            </div>
        </div>
        <!-- Opening Stock -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_stock" class="form-label">Opening Stock</label>
                <input type="number" class="form-control" id="item_stock" name="item_stock" required>
            </div>
        </div>
        
        <!-- Minimum Stock Alert -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_min_stock" class="form-label">Minimum Stock Alert</label>
                <input type="number" class="form-control" id="item_min_stock" name="item_min_stock" required>
            </div>
        </div>
        
        <!-- Size -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_size" class="form-label">Size</label>
                <input type="text" class="form-control" id="item_size" name="item_size" required>
            </div>
        </div>
        
        <!-- Make -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_make" class="form-label">Make</label>
                <input type="text" class="form-control" id="item_make" name="item_make" required>
            </div>
        </div>
        
        <!-- UOM -->
        <div class="col-lg-4">
            <div class="mb-3">
                <label for="item_uom" class="form-label">Unit of Measure (UOM)</label>
                <select class="form-control" id="item_uom" name="item_uom" required>
                    <option value="" disabled selected>Select Tax</option>
                    @foreach ($units as $unit)
                    <option value="{{$unit->unit_id}}">{{$unit->unit_name}}</option>
                    @endforeach
                </select>
                
            </div>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="row">
        <div class="col-lg-12 ">
            <button type="submit" class="btn btn-primary">Add Item</button>
            <a href="{{ route('item') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>

@endsection
@section('script')

@endsection