@extends('layouts.default')
@section('title')
    PO Item Add
@endsection
@section('content')
<div class="row mt-3 mr-3">
    <div class="col-lg-4">
        <form action="{{ route('poItemAddPost',request('id'))}}" method="POST">
            <!-- CSRF Token (if needed in Laravel) -->
            @csrf

            
                    
                            <div class="form-group">
                                <label for="itemName">Item Name</label>
                                <select name="item" id="item" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($items as $item)
                                    <option value="{{$item->item_id}}">{{$item->item_name}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                
                            <!-- Quantity -->
                            <div class="form-group">
                                <label for="quantity">Qty</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    placeholder="Enter quantity" required>
                            </div>
                
                            <!-- Rate -->
                            <div class="form-group">
                                <label for="rate">Rate</label>
                                <input type="number" step="0.01" class="form-control" id="rate" name="rate"
                                    placeholder="Enter rate" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="rate">Desc</label>
                                <textarea name="desc"  class="form-control" id="desc" cols="30" rows="10"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Item</button>
                    
                
            <!-- Item Name -->
        </form>
    </div>
</div>
@endsection

@section('script')
@endsection
