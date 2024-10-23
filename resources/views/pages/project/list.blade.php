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
            <table id="projectTable" class="display">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Project no</th>
                        <th>Client</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>PO pending</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $projects = [
                            (object) [
                                'id' => 1,
                                'project_no' => 'PJ001',
                                'client' => 'Client 1',
                                'date' => '2024-10-01',
                                'po_pending' => '0',
                                'status' => 'Started',
                            ],
                            (object) [
                                'id' => 2,
                                'project_no' => 'PJ002',
                                'client' => 'Client 2',
                                'date' => '2024-10-02',
                                'po_pending' => '0',
                                'status' => 'Design',
                            ],
                            (object) [
                                'id' => 3,
                                'project_no' => 'PJ003',
                                'client' => 'Client 3',
                                'date' => '2024-10-03',
                                'po_pending' => '2',
                                'status' => 'Quality',
                            ],
                            (object) [
                                'id' => 4,
                                'project_no' => 'PJ004',
                                'client' => 'Client 4',
                                'date' => '2024-10-04',
                                'po_pending' => '0',
                                'status' => 'Assembly',
                            ],
                            (object) [
                                'id' => 5,
                                'project_no' => 'PJ005',
                                'client' => 'Client 5',
                                'date' => '2024-10-05',
                                'po_pending' => '1',
                                'status' => 'Ready for dispatch',
                            ],
                            // Add more clients as needed
                        ];
                    @endphp
            
                    @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->project_no }}</td>
                        <td>{{ $project->client }}</td>
                        <td>{{ $project->date }}</td>
                        
                        <td>{{ $project->status }}</td>
                        <td>{{ $project->po_pending }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $project->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $project->id }}">
                                    <li><a class="dropdown-item" href="{{ route('element_in_project.list', $project->id) }}">Manage Elements</a></li>
                                    
                                    <li><a class="dropdown-item" href="{{ route('project.edit', $project->id) }}">Edit Project</a></li>

                                    <li><a class="dropdown-item" href="{{ route('po.convert', $project->id) }}">Make PO of it</a></li>
                                    
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