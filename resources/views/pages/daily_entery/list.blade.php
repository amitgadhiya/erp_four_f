@extends('layouts.default')
@section('title')
    Daily Data Entery
@endsection
@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 text-end">
            <a href="{{ route('daily_entery.add') }}" class="btn btn-primary" >
                Add Date
            </a>
        </div>
    </div>
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive mt-3">
            <table id="elementTable" class="display">
                <thead>
                    <tr>
                        <th>Sr.</th>
                        <th>Date</th>
                        <th>Total Time</th>
                        <th>Total Emp</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <!-- Dropdown filters for each column -->
                        <th>

                        </th>
                        <th>
                            <select class="column-filter" multiple="multiple">
                                <option value="">All</option>
                            </select>
                        </th>
                        <th>
                            <select class="column-filter" multiple="multiple">
                                <option value="">All</option>
                            </select>
                        </th>
                        <th>
                            <select class="column-filter" multiple="multiple">
                                <option value="">All</option>
                            </select>
                        </th>
                        <th>
                            
                        </th>
                         <!-- No filter for Actions column -->
                    </tr>
                </thead>
                <tbody>
                    @php
                        $daily_work = [
                            (object) [
                                'id' => 1,
                                'date' => '17-11-2025',
                                'total_time' => '24:30',
                                'total_emp' => '3',
                                
                            ],
                            (object) [
                                'id' => 2,
                                'date' => '16-11-2025',
                                'total_time' => '23:30',
                                'total_emp' => '3',
                            ],
                            (object) [
                                'id' => 3,
                                'date' => '15-11-2025',
                                'total_time' => '25:30',
                                'total_emp' => '3',
                            ],
                            (object) [
                                'id' => 4,
                                'date' => '14-11-2025',
                                'total_time' => '12:30',
                                'total_emp' => '2',
                            ],
                            (object) [
                                'id' => 5,
                                'date' => '13-11-2025',
                                'total_time' => '32:30',
                                'total_emp' => '4',
                            ],
                            // Add more clients as needed
                        ];
                    @endphp

                    @foreach ($daily_work as $work)
                        <tr>
                            <td>{{ $work->id }}</td>
                            <td>{{ $work->date }}</td>
                            <td>{{ $work->total_time }}</td>
                            <td>{{ $work->total_emp }}</td>
                            
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-link pr-3" type="button"
                                        id="dropdownMenuButton-{{ $work->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $work->id }}">
                                        <li><a class="dropdown-item" href="{{ route('daily_entery.edit') }}">edit </a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('daily_entery.manage') }}">Manage Work </a>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Delete </a>
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
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#elementTable').DataTable({
                // You can customize the DataTable options here
                responsive: true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                initComplete: function() {
                    var api = this.api();

                    // For each column with a select element
                    api.columns().every(function() {
                        var column = this;
                        var select = $('select', this.header());

                        // Initialize Select2 for multi-select dropdowns
                        select.select2({
                            placeholder: 'Select options',
                            allowClear: true
                        });

                        // Populate the dropdown with unique column values
                        column.data().unique().sort().each(function(d, j) {
                            select.append('<option value="' + d + '">' + d +
                                '</option>')
                        });

                        // Handle multi-select filtering
                        select.on('change', function() {
                            var selected = $(this).val();

                            if (selected && selected.length > 0) {
                                // If options are selected, filter based on the selection
                                var regex = selected.map(function(val) {
                                    return '^' + $.fn.dataTable.util
                                        .escapeRegex(val) + '$';
                                }).join('|');
                                column.search(regex, true, false).draw();
                            } else {
                                // If no options are selected, clear the filter to show all rows
                                column.search('').draw();
                            }
                        });
                    });
                }
            });
        });
    </script>
@endsection