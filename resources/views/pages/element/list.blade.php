@extends('layouts.default')
@section('title')
    Element List
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container {
        width: 100% !important;
    }
</style>

<div class="row">
    <div class="col-lg-6 ">
        <a href="{{ route('project') }}" class="btn btn-link">
            < Back
        </a>
    </div>
    <div class="col-lg-6 text-end">
        
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadModal">
            Upload Excel
        </button>
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4">
        <table class="table">
            <tr><td>Project Name :</td><td>{{ $project->pro_name }}</td></tr>
            <tr><td>Project Number :</td><td>{{ $project->pro_number }}</td></tr>
            <tr><td>Customer Name :</td><td>{{ $project->party->party_name ?? 'N/A' }}</td></tr>
            <tr><td>Project Start Date :</td><td>{{ \Carbon\Carbon::parse($project->pro_po_date)->format('d-m-Y') }}</td></tr>
            <tr><td>Project Target Date :</td><td>{{ \Carbon\Carbon::parse($project->pro_end_date)->format('d-m-Y') }}</td></tr>
            <tr><td>Project Status :</td><td>{{ ucfirst($project->pro_final) }}</td></tr>
        </table>
    </div>
    
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        <form action="{{route('projectElementAddPost',[request('id')])}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <!-- Element Number -->
                    <div class="form-group">
                        <label for="elementNumber">Element Number</label>
                        <input type="text" class="form-control" id="ele_code" name="ele_code" value="" 
                            placeholder="Enter element number" required>
                    </div>
                    
                    <!-- Element Name -->
                    <div class="form-group">
                        <label for="elementName">Element Name</label>
                        <input type="text" class="form-control" id="ele_name" name="ele_name"
                            placeholder="Enter element name" required>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="ele_qty" name="ele_qty"
                            placeholder="Enter quantity" required>
                    </div>
                    
                </div>
                <div class="col-lg-6">
                    <!-- Category -->

                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="ele_type" name="ele_type" required>
                            <option value="">Select</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Hydraulic">Hydraulic</option>
                            <option value="Manufacturing">Manufacturing</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Item</label>
                        <select class="form-control" id="ele_item_id" name="ele_item_id" required>
                            <option value="">Select</option>
                            @foreach ($items as $item)
                            <option value="{{$item->item_id}}">{{$item->item_name}}</option>
                            @endforeach
                            
                            
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="quantity">Size</label>
                        <input type="text" class="form-control" id="ele_size" name="ele_size"
                            placeholder="Enter size" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Material</label>
                        <input type="text" class="form-control" id="ele_material" name="ele_material"
                            placeholder="Enter Material" required>
                    </div>
                    

                

            

                    
                    
                </div>
            </div>




            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive mt-3">
            <table id="elementTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Sr.</th>
                        <th>Element No</th>
                        <th>Element Name</th>
                        <th>Element Type</th>
                        <th>Qty</th>
                        <th>Material</th>
                        <th>Size</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <th></th>
                        @for ($i = 1; $i <= 6; $i++)
                            <th><select class="column-filter" multiple="multiple"><option value="">All</option></select></th>
                        @endfor
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($elements as $key => $element)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $element->ele_code }}</td>
                            <td>{{ $element->ele_name }}</td>
                            <td>{{ $element->ele_type }}</td>
                            <td>{{ $element->ele_qty }}</td>
                            <td>{{ $element->ele_material }}</td>
                            <td>{{ $element->ele_size }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link pr-3" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('projectElementEdit',['pid'=>$element->ele_pro_id,'id'=>$element->ele_id] ) }}">
                                                Edit Element
                                            </a>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('projectElementDelete', ['pid'=>$element->ele_pro_id,'id'=>$element->ele_id]) }}">
                                                @csrf
                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Delete this element?')">Delete</button>
                                            </form>
                                        </li>
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

{{-- Upload Excel Modal --}}
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="uploadForm" method="POST" action="{{ route('elementAddExcel',['id'=>request('id')])}}" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h5 class="modal-title">Upload Excel File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="excelFile">Select Excel File</label>
                    <input type="file" class="form-control" name="excelFile" accept=".xls, .xlsx" required>
                </div>
                <div class="mb-3">
                    <label for="elementType">Type of Elements</label>
                    <select class="form-control" name="elementType" required>
                        <option value="" disabled selected>Select type</option>
                        <option value="Hardware" >Hardware</option>
                        <option value="Manufacturing" >Manufacturing</option>
                        <option value="Hydraulic" >Hydraulic</option>
                        
                    </select>
                </div>
                <input type="hidden" name="project_id" value="{{ $project->pro_id }}">
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#elementTable').DataTable({
            responsive: true,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            initComplete: function() {
                var api = this.api();
                api.columns().every(function() {
                    var column = this;
                    var select = $('select', this.header());

                    select.select2({ placeholder: 'Filter', allowClear: true });

                    column.data().unique().sort().each(function(d) {
                        if (d) select.append('<option value="' + d + '">' + d + '</option>');
                    });

                    select.on('change', function() {
                        var selected = $(this).val();
                        if (selected && selected.length > 0) {
                            var regex = selected.map(val => '^' + $.fn.dataTable.util.escapeRegex(val) + '$').join('|');
                            column.search(regex, true, false).draw();
                        } else {
                            column.search('').draw();
                        }
                    });
                });
            }
        });
    });
</script>
@endsection
