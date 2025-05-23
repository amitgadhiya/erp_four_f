@extends('layouts.default')
@section('title')
    List Raw Item
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('raw_item.add') }}" class="btn btn-primary">Add Raw Item</a>
    </div>
</div>
<div class="table-responsive mt-3">
    <table id="itemTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
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
            @php
                $items = [
        (object) [
            'id' => 1,
            'name' => 'Item 1',
            'item_code' => 'ITM001',
            'category' => 'Consumable ',
            'opening_stock' => 50,
            'min_stock_alert' => 10,
            'size' => '4X15',
            'make' => 'Bossh',
            'uom' => 'NOS',
        ],
        (object) [
            'id' => 2,
            'name' => 'Item 2',
            'item_code' => 'ITM002',
            'category' => 'Raw material',
            'opening_stock' => 30,
            'min_stock_alert' => 5,
            'size' => '4X5',
            'make' => 'Bossh',
            'uom' => 'NOS',
        ]
    ];
            @endphp
            @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->item_code }}</td>
                <td>{{ $item->category }}</td>
                <td>{{ $item->size }}</td>
                <td>{{ $item->make }}</td>
                <td>{{ $item->uom }}</td>
                <td>{{ $item->opening_stock }}</td>
                <td>{{ $item->min_stock_alert }}</td>
                <td>
                    <a href="{{ route('raw_item.edit', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('raw_item.delete', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
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
