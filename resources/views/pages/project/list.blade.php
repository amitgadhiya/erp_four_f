@extends('layouts.default')
@section('title')
    Project List 
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">

    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive mt-3">
            <table id="projectTable" class="table table-bordered table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.</th>
                        <th>Project no</th>
                        <th>Client</th>
                        <th>PO Date</th>
                        
                        <th>PO No.</th>
                        
                        <th>Input<br>Status</th>
                        <th>DAP Status</th>
                        <th>DAP  
                            Approval<br> Status</th>
                        <th>Final</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
            
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $project->pro_number }}</td>
                        <td>{{ $project->party->party_name }}</td>
                        <td>{{ $project->pro_po_date }}</td>
                        
                        <td>{{ $project->pro_po_number }}</td>
                        
                        <td class="{{ $project->pro_input == 'Pending' ? "bg-warning":"bg-success" }}">{{ $project->pro_input }}</td>

                        <td class="{{ $project->pro_dap == 'Load' ? "bg-danger": ($project->pro_dap == 'Inprocess' ? "bg-warning" : "bg-success")}}">{{ $project->pro_dap }}</td>

                        <td class="{{ $project->pro_dap_app == 'Pending' ? "bg-warning":"bg-success" }}">{{ $project->pro_dap_app }}</td>

                        <td class="{{ $project->pro_final == 'Load' ? "bg-danger": ($project->pro_final == 'Inprocess' ? "bg-warning" : "bg-success")}}">{{ $project->pro_final }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $project->pro_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $project->pro_id }}">
                                    <li><a class="dropdown-item" href="{{ route('projectElement', $project->pro_id) }}">Manage Elements</a></li>
                                    
                                    <li><a class="dropdown-item" href="{{ route('projectEdit', $project->pro_id) }}">Edit Project</a></li>

                                    <li><a class="dropdown-item" href="{{ route('projectPOAdd', $project->pro_id) }}">Make PO of it</a></li> 
                                    
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
        $('#projectTable').DataTable({
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