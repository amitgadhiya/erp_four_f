@extends('layouts.default')
@section('title')
    List Enquiry
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 d-flex justify-content-end">
        <a href="{{ route('enquiryAdd') }}" class="btn btn-primary">Add Enquiry</a>
    </div>
</div>
<div class="table-responsive mt-3">
    <table id="enquiryTable" class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Enquiry No</th>
                <th>Customer</th>
                <th>Date</th>
                <th>Priority</th>
                
                <th>Input </th>
                <th>Concept Working</th>
                <th>Concept Approval</th>
                <th>Remark </th>
                <th>Status </th>
                
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
           
    
            @foreach ($enqs as $enq)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $enq->enq_number }} 
                    <i class="fas fa-info-circle text-info" 
             data-bs-toggle="tooltip" 
             data-bs-trigger="click" 
             data-bs-placement="right" 
             title="{{ $enq->enq_details }}">
          </i>
                 </i>

                </td>
                <td>{{ $enq->party->party_name }}</td>
                <td>{{ $enq->enq_date }}</td>
                <td class="{{ $enq->enq_priority == 'Hot' ? 'bg-danger' : ($enq->enq_priority == 'Warm' ? 'bg-warning' : ($enq->enq_priority == 'Cold' ? 'bg-primary' : '')) }}">{{ $enq->enq_priority }}</td>
                
                
                <td class="{{ $enq->enq_input == 'Complete' ? 'bg-success':'bg-danger'}}">{{ $enq->enq_input }}</td>
                <td class="{{ $enq->enq_cons_work == 'Complete' ? 'bg-success':'bg-danger'}}">{{ $enq->enq_cons_work }}</td>
                <td class="{{ $enq->enq_cons_app == 'Complete' ? 'bg-success':'bg-danger'}}">{{ $enq->enq_cons_app }}</td>
                <td>{{ $enq->enq_remark }}</td>
                <td>{{ $enq->enq_work_status }}</td>
                
                <td>
                    <div class="dropdown">
                        <button class="btn btn-link pr-3" type="button" id="dropdownMenuButton-{{ $enq->enq_id }}" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $enq->enq_id }}">
                            <li><a class="dropdown-item" href="{{ route('enqdetails', $enq->enq_id) }}">Manage</a></li>
                            
                            <li><a class="dropdown-item" href="{{ route('enquiryEdit', $enq->enq_id) }}">Edit</a></li>
                            <li><a class="dropdown-item" href="{{ route('quotationAdd',['id'=>$enq->enq_id]) }}">convert to quotation</a></li>
                            {{-- <li><a class="dropdown-item" href="#">Reverse Enquiry</a></li> --}}
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
        $('#enquiryTable').DataTable({
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