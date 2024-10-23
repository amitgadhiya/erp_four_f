@extends('layouts.default')
@section('title')
     PO List
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive mt-3">
            <table id="poTable" class="display">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>PO no</th>
                        <th>Vender</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $pos = [
                            (object) [
                                'id' => 1,
                                'po_no' => 'PO01',
                                'vender' => 'Vender 1',
                                'date' => '2024-10-02',
                                'status' => 'received',
                            ],
                            (object) [
                                'id' => 2,
                                'po_no' => 'PO002',
                                'vender' => 'Vender 2',
                                'date' => '2024-10-02',
                                'status' => 'received',
                            ],
                            (object) [
                                'id' => 3,
                                'po_no' => 'PO003',
                                'vender' => 'Vender 3',
                                'date' => '2024-10-03',
                                'status' => 'Pending',
                            ],
                            (object) [
                                'id' => 4,
                                'po_no' => 'PO004',
                                'vender' => 'Vender 4',
                                'date' => '2024-10-04',
                                'status' => 'received',
                            ],
                            (object) [
                                'id' => 5,
                                'po_no' => 'PO005',
                                'vender' => 'Vender 5',
                                'date' => '2024-10-05',
                                'status' => 'Ordered',
                            ],
                            // Add more clients as needed
                        ];
                    @endphp
            
                    @foreach ($pos as $po)
                    <tr>
                        <td>{{ $po->id }}</td>
                        <td>{{ $po->po_no }}</td>
                        <td>{{ $po->vender }}</td>
                        <td>{{ $po->date }}</td>
                        
                        <td>{{ $po->status }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $po->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $po->id }}">
                                    
                                    
                                    <li><a class="dropdown-item" href="{{ route('po.edit', $po->id) }}">Edit PO</a></li>

                                    <li><a class="dropdown-item" href="{{ route('po_item.list', $po->id) }}">Manage PO</a></li>
                                    
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
