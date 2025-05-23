@extends('layouts.default')
@section('title')
     PO Item Edit
@endsection
@section('content')
<div class="row">
    <div class="col-lg-4">
        <form action="{{ route('poItemEditPost',['pid'=>request('pid'),'id'=>request('id')])}}" method="POST">
            <!-- CSRF Token (if needed in Laravel) -->
            @csrf

            
                    
                            <div class="form-group">
                                <label for="itemName">Item Name</label>
                                <select name="item" id="item" class="form-control">
                                    <option value="{{$poitem->item->item_id}}">{{$poitem->item->item_name}}</option>
                                    @foreach ($items as $item)
                                    <option value="{{$item->item_id}}">{{$item->item_name}}</option>
                                    @endforeach
                                    
                                    
                                </select>
                            </div>
                
                            <!-- Quantity -->
                            <div class="form-group">
                                <label for="quantity">Qty</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" value="{{$poitem->poi_qty}}"
                                    placeholder="Enter quantity" required>
                            </div>
                
                            <!-- Rate -->
                            <div class="form-group">
                                <label for="rate">Rate</label>
                                <input type="number" step="0.01" class="form-control" id="rate" name="rate" value="{{$poitem->poi_rate}}"
                                    placeholder="Enter rate" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="rate">Desc</label>
                                <textarea name="desc"  class="form-control" id="desc" cols="30" rows="10">{{$poitem->poi_desc}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Item</button>
                    
                
            <!-- Item Name -->
        </form>

    </div>
</div>
@endsection

@section('script')
@endsection