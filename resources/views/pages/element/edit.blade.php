@extends('layouts.default')
@section('title')
    Element Edit
@endsection

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container {
        width: 100% !important;
    }
</style>

<div class="row">
    <div class="col-lg-12">
        <a href="{{ route('projectElement', ['id' => $project->pro_id]) }}" class="btn btn-link">
            < Back
        </a>
        
    </div>
</div>

<div class="row mt-3">
    <div class="col-lg-4">
        <table class="table">
            <tr><td>Project Name :</td><td>{{ $project->pro_name }}</td></tr>
            <tr><td>Project Number :</td><td>{{ $project->pro_number }}</td></tr>
            <tr><td>Client Name :</td><td>{{ $project->party->party_name ?? 'N/A' }}</td></tr>
            <tr><td>Project Start Date :</td><td>{{ \Carbon\Carbon::parse($project->pro_po_date)->format('d-m-Y') }}</td></tr>
            <tr><td>Project Target Date :</td><td>{{ \Carbon\Carbon::parse($project->pro_end_date)->format('d-m-Y') }}</td></tr>
            <tr><td>Project Status :</td><td>{{ ucfirst($project->pro_final) }}</td></tr>
        </table>
    </div>
    
    <div class="col-lg-1"></div>
    <div class="col-lg-4">
        <form action="{{route('projectElementEditPost',['pid'=>request('pid'),'id'=>request('id')])}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <!-- Element Number -->
                    <div class="form-group">
                        <label for="elementNumber">Element Number</label>
                        <input type="text" class="form-control" id="ele_code" name="ele_code" value="{{$element->ele_code}}" readonly
                            placeholder="Enter element number" required>
                    </div>
                    
                    <!-- Element Name -->
                    <div class="form-group">
                        <label for="elementName">Element Name</label>
                        <input type="text" class="form-control" id="ele_name" name="ele_name" value="{{$element->ele_name}}"
                            placeholder="Enter element name" required>
                    </div>

                    <!-- Quantity -->
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="ele_qty" name="ele_qty" value="{{$element->ele_qty}}"
                            placeholder="Enter quantity" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <!-- Category -->
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="ele_type" name="ele_type" required>
                            <option value="{{$element->ele_type}}">{{$element->ele_type}}</option>
                            <option value="Hardware">Hardware</option>
                            <option value="Hydraulic">Hydraulic</option>
                            <option value="Manufacturing">Manufacturing</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="quantity">Size</label>
                        <input type="text" class="form-control" id="ele_size" name="ele_size" value="{{$element->ele_size}}"
                            placeholder="Enter size" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Material</label>
                        <input type="text" class="form-control" id="ele_material" name="ele_material" value="{{$element->ele_material}}"
                            placeholder="Enter Material" required>
                    </div>
                
                    

                

            

                    
                    
                </div>
            </div>




            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
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
