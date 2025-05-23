@extends('layouts.default')
@section('title')
     PO List
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-end">
                <a href="{{ route('poAdd') }}" class="btn btn-primary">Add PO</a>
            </div>
        </div>
        <div class="table-responsive mt-3">
            <table id="poTable" class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.</th>
                        <th>PO no</th>
                        <th>Vender</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
            
                    @foreach ($pos as $po)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $po->po_number }}</td>
                        <td>{{ $po->party->party_name }}</td>
                        <td>{{ $po->po_date }}</td>
                        
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $po->po_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $po->po_id }}">
                                    
                                    
                                    <li><a class="dropdown-item" href="{{ route('poEdit', $po->po_id) }}">Edit PO</a></li>

                                    <li><a class="dropdown-item" href="{{ route('poItem', $po->po_id) }}">Manage PO</a></li>
                                    <li><a class="dropdown-item" href="{{ route('poView', $po->po_id) }}">View PO</a></li>
                                    
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
        $('#poTable').DataTable({
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
