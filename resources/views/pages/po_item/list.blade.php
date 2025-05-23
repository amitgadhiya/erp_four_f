@extends('layouts.default')
@section('title')
     PO Item List
@endsection
@section('content')


<div class="row">
    <div class="col-lg-4 text-right">
        <table class="table">
            <tr>
                <td>Project No</td>
                <td>{{$po->po_number}}</td>
            </tr>
            <tr>
                <td>Vender Name</td>
                <td>{{$po->party->party_name}}</td>
            </tr>
        </table>
    </div>
    <div class="col-lg-8 text-right">
        <a href="{{route('poItemAdd',request('id'))}}" class="btn btn-success">Add PO Item</a>
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
                        
                        <th>Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                   
            
                    @foreach ($poitems as $poitem)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>
                            {{ $poitem->item->item_name }}<br>
                            {{ $poitem->poi_desc }}
                        
                        </td>
                        <td>{{ $poitem->poi_qty }}</td>
                        <td>{{ $poitem->poi_rate }}</td>
                        
                        
                        <td>{{ $poitem->poi_rate * $poitem->poi_qty }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $poitem->poi_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $poitem->poi_id }}">
                                    
                                    
                                    <li><a class="dropdown-item" href="{{ route('poItemEdit', ['pid'=>$po->po_id,'id'=>$poitem->poi_id]) }}">Edit </a></li>

                                    <li><a class="dropdown-item" href="{{ route('poItemDelete', ['pid'=>$po->po_id,'id'=>$poitem->poi_id]) }}">Delete</a></li>
                                    
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
