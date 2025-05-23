@extends('layouts.default',['__menu' => 'master','__menu_sub' => 'item'])
@section('title')
    List  Item
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('itemAdd') }}" class="btn btn-primary">Add Item</a>
    </div>
</div>
<div class="table-responsive mt-3">
    <table id="itemTable" class="display">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Category</th>
                <th>Item Code</th>
                <th>Item Name</th>
                <th>Size</th>
                <th>Make</th>
                <th>UOM</th>
                <th>Opening Stock</th>
                <th>Min Stock Alert</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->catg->ic_name }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->item_size }}</td>
                <td>{{ $item->item_make }}</td>
                <td>{{ $item->item_uom }}</td>
                <td>{{ $item->item_stock }}</td>
                <td>{{ $item->item_min_alert }}</td>
                <td>
                    <a href="{{ route('itemLog', $item->item_id) }}" class="btn btn-link">Log</a>
                    <a href="{{ route('itemEdit', $item->item_id) }}" class="btn btn-link">Edit</a>
                    <a href="{{route("itemDelete",$item->item_id)}}" onclick="return confirm('Are you sure you want to delete it')" class="btn btn-link btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#itemTable').DataTable({
            responsive: true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endsection
