@extends('layouts.default',['__menu' => 'master','__menu_sub' => 'item'])
@section('title')
    List Item Stock Log
@endsection
@section('content')

<div class="table-responsive mt-3">
    <table id="itemTable" class="display">
        <thead>
            <tr>
                <th>Sr</th>
                <th>Date</th>
                <th>By User</th>
                <th>Doc</th>
                <th>Doc No</th>
                <th>In</th>
                <th>Out</th>
                
            </tr>
        </thead>
        <tbody>
            
            @foreach ($stock_log as $log)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ \Carbon\Carbon::parse($log->sl_created_on)->format('d-m-Y') }}</td>
                <td>{{ $log->emp_name }}</td>
                <td>{{ $log->sl_doc_type }}</td>
                <td>{{ $log->sl_doc_no }}</td>
                <td>{{ $log->sl_type=="in" ? $log->sl_qty : "-" }}</td>
                <td>{{ $log->sl_type=="out" ? $log->sl_qty : "-" }}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('#itemTable').DataTable({
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
