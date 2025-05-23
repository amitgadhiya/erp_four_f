@extends('layouts.default')
@section('title')
    Issue Item
@endsection
@section('content')
<div class="row mt-3">
    <div class="col-lg-4">
        <form onsubmit="return checkStockBeforeSubmit()" action="{{route('issuePost')}}" method="post" >
            <!-- CSRF Token -->
            @csrf

            
            

            <div class="form-group">
                <label for="recipient">To Department Name</label>
                <select required name="dept" id="dept" class="form-control">
                    <option value="">Select</option>
                    @foreach ($depts as $dept)
                    <option value="{{$dept->dept_id}}">{{$dept->dept_name}}</option>
                    @endforeach
                    
                </select>
            </div>

            <!-- Recipient Name -->
            <div class="form-group">
                <label for="recipient">Recipient Name</label>
                <select required name="emp" id="emp" class="form-control">
                    <option value="">Select</option>
                    @foreach ($emps as $emp)
                    <option value="{{$emp->emp_id}}">{{$emp->emp_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="recipient">Item</label>
                <select required name="item" id="item" class="form-control">
                    <option value="">Select</option>
                    @foreach ($items as $item)
                    <option value="{{$item->item_id}}" data-stock="{{ $item->item_stock }}" >{{$item->item_name}} ({{$item->item_stock}})</option>
                    @endforeach
                </select>
            </div>

            
            <div class="form-group">
                <label for="remarks">Quantity</label>
                <input required type="text" class="form-control" id="qty" name="qty">
                
            </div>
            
            <!-- Remarks -->
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" name="remarks" rows="3" placeholder="Enter remarks (optional)"></textarea>
            </div>
            <input type="submit" class="btn btn-success" value="Issue">
        </form>
    </div>
</div>



@endsection
@section('script')
<script>
    function checkStockBeforeSubmit() {
        const itemSelect = document.getElementById('item');
        const qtyInput = document.getElementById('qty');

        const selectedOption = document.querySelector('#item option:checked');
const availableStock = parseFloat(selectedOption.getAttribute('data-stock'));
        const enteredQty = parseFloat(qtyInput.value);
        //alert(availableStock);
        if (enteredQty > availableStock) {
            alert("Quantity exceeds available stock (" + availableStock + ").");
            return false;
        }
        return true;
    }
    

</script>
    
@endsection