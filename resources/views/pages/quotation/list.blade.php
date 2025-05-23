@extends('layouts.default')
@section('title')
    List Quotation
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        {{-- <a href="{{ route('quotationAdd') }}" class="btn btn-primary">Add Quotation</a> --}}
    </div>
</div>
<div class="table-responsive mt-3">
    <table id="quotationTable" class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Quotation No</th>
                <th>Client</th>
                <th>Date</th>
                <th>Last Follow up</th>
                <th>Next Follow up</th>
                <th>Remark</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
    
            @foreach ($quotations as $quotation)
            <tr>
                <td>{{ $quotation->id }}</td>
                <td>{{ $quotation->quot_number }}</td>
                <td>{{ $quotation->party->party_name }}</td>
                <td>{{ $quotation->quot_date }}</td>
                <td>{{ $quotation->nextFollowUp?->fu_done_date }}
                    <i class="fas fa-info-circle text-info" 
             data-bs-toggle="tooltip" 
             data-bs-trigger="click" 
             data-bs-placement="right" 
             title="{{ $quotation->nextFollowUp?->fu_remark }}">
          </i>
                </td>
                <td>{{ $quotation->nextFollowUp?->fu_do_date }}</td>
                <td>{{$quotation->quot_remake}}</td>
                
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $quotation->quot_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $quotation->quot_id }}">
                            <li><a class="dropdown-item" href="{{ route('quotationView', $quotation->quot_id) }}">View</a></li>
                            <li><a class="dropdown-item" href="{{ route('followup', $quotation->quot_id) }}">Follow-Up</a></li>
                            
                            <li><a class="dropdown-item" href="{{ route('quotationEdit', $quotation->quot_id) }}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{ route('quotationdetail', $quotation->quot_id) }}">Manage</a></li>
                            <li><a class="dropdown-item" href="{{ route('projectAdd', $quotation->quot_id) }}">convert to project</a></li>
                            
                            {{-- <li><a class="dropdown-item" href="#">Save as</a></li> --}}
                        </ul>
                    </div>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
<style>
    .btn-link {
        padding: 0;
        margin: 0;
    }
    .fa-ellipsis-v {
        font-size: 18px;
        cursor: pointer;
    }
</style>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#quotationTable').DataTable({
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
<script>
    // Initialize tooltips
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl);
    });
  
    // Close all tooltips when a new one is clicked
    tooltipTriggerList.forEach(function (tooltipTriggerEl) {
      tooltipTriggerEl.addEventListener('click', function (event) {
        tooltipList.forEach(function (tooltip) {
          tooltip.hide(); // Hide all tooltips first
        });
        // Show the clicked tooltip
        var clickedTooltip = bootstrap.Tooltip.getInstance(event.currentTarget);
        clickedTooltip.show();
        event.stopPropagation();
      });
    });
  
    // Close tooltips when clicking outside
    document.addEventListener('click', function () {
      tooltipList.forEach(function (tooltip) {
        tooltip.hide();
      });
    });
  </script>
@endsection