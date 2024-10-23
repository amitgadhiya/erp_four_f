@extends('layouts.default')
@section('title')
     PO List
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12 text-right">
        <a href="{{ route('po_item.add')}}" class="btn btn-primary">Add Item</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive mt-3">
            <table id="itemTable" class="display">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Rate</th>
                        <th>Dis</th>
                        <th>Tax</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $items = [
                            (object) [
                                'id' => 1,
                                'po_item' => 'Item name 1',
                                'qty' => '1 nos',
                                'rate' => '5000',
                                'discount' => '10',
                                'tax' => '18',
                                'amount' => '3000',
                                'status' => 'Ordered',
                            ],
                            (object) [
                                'id' => 2,
                                'po_item' => 'Item name 2',
                                'qty' => '1 nos',
                                'rate' => '5000',
                                'discount' => '10',
                                'tax' => '18',
                                'amount' => '3000',
                                'status' => 'Ordered',
                            ],
                            (object) [
                                'id' => 3,
                                'po_item' => 'Item name 3',
                                'qty' => '1 nos',
                                'rate' => '5000',
                                'discount' => '10',
                                'tax' => '18',
                                'amount' => '3000',
                                'status' => 'Ordered',
                            ],
                            (object) [
                                'id' => 4,
                                'po_item' => 'Item name 4',
                                'qty' => '1 nos',
                                'rate' => '5000',
                                'discount' => '10',
                                'tax' => '18',
                                'amount' => '3000',
                                'status' => 'Ordered',
                            ],
                            (object) [
                                'id' => 5,
                                'po_item' => 'Item name 5',
                                'qty' => '1 nos',
                                'rate' => '5000',
                                'discount' => '10',
                                'tax' => '18',
                                'amount' => '3000',
                                'status' => 'Ordered',
                            ],
                            // Add more clients as needed
                        ];
                    @endphp
            
                    @foreach ($items as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->po_item }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->rate }}</td>
                        
                        <td>{{ $item->discount }}</td>
                        <td>{{ $item->tax }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $item->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $item->id }}">
                                    
                                    
                                    <li><a class="dropdown-item" href="{{ route('po_item.edit', $item->id) }}">Edit </a></li>

                                    <li><a class="dropdown-item" href="{{ route('po_item.delete', $item->id) }}">Delete</a></li>
                                    
                                </ul>
                            </div>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#itemTable').DataTable({
            // You can customize the DataTable options here
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
