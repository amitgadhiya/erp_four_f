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
        <div class="col-lg-4">
            <table class="table">
                <tr>
                    <td>Project Name : </td>
                    <td>Some name of prject</td>
                </tr>
                <tr>
                    <td>Project Number : </td>
                    <td>PJ005</td>
                </tr>
                <tr>
                    <td>Client Name : </td>
                    <td>Some Client Name</td>
                </tr>
                <tr>
                    <td>Project Start Date : </td>
                    <td>01-10-2024</td>
                </tr>
                <tr>
                    <td>Project Tartget Date : </td>
                    <td>30-10-2014</td>
                </tr>
                <tr>
                    <td>Project Status : </td>
                    <td>Production</td>
                </tr>
            </table>
        </div>
        <div class="col-lg-8">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- Element Number -->
                        <div class="form-group">
                            <label for="elementNumber">Element Number</label>
                            <input type="text" class="form-control" id="elementNumber" name="elementNumber"
                                placeholder="Enter element number" required>
                        </div>

                        <!-- Element Name -->
                        <div class="form-group">
                            <label for="elementName">Element Name</label>
                            <input type="text" class="form-control" id="elementName" name="elementName"
                                placeholder="Enter element name" required>
                        </div>

                        <!-- Category -->
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category"
                                placeholder="Enter category" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Quantity -->
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                placeholder="Enter quantity" required>
                        </div>

                        <!-- Production Status (Select Dropdown) -->
                        <div class="form-group">
                            <label for="productionStatus">Production Status</label>
                            <select class="form-control" id="productionStatus" name="productionStatus" required>
                                <option value="">Select production status</option>
                                <option value="In Production">In Production</option>
                                <option value="Completed">Completed</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>

                        <!-- Order Status (Select Dropdown) -->
                        <div class="form-group">
                            <label for="orderStatus">Order Status</label>
                            <select class="form-control" id="orderStatus" name="orderStatus" required>
                                <option value="">Select order status</option>
                                <option value="Ordered">Ordered</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Delivered">Delivered</option>
                            </select>
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
                <table id="elementTable" class="display">
                    <thead>
                        <tr>
                            <th>Sr.</th>
                            <th>Element no</th>
                            <th>Element Name</th>
                            <th>Element Catg</th>
                            <th>Qty</th>
                            <th>Production Status</th>
                            <th>Ordered Status</th>
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
                            <th></th> <!-- No filter for Actions column -->
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $elements = [
                                (object) [
                                    'id' => 1,
                                    'element_no' => 'EL001',
                                    'element' => 'name',
                                    'catg' => '1',
                                    'qty' => '1',
                                    'status_pro' => 'Started',
                                    'status_order' => 'pending',
                                ],
                                (object) [
                                    'id' => 2,
                                    'element_no' => 'EL002',
                                    'element' => 'name',
                                    'catg' => '2',
                                    'qty' => '1',
                                    'status_pro' => 'Cutting',
                                    'status_order' => 'revived',
                                ],
                                (object) [
                                    'id' => 3,
                                    'element_no' => 'EL003',
                                    'element' => 'name',
                                    'catg' => '3',
                                    'qty' => '2',
                                    'status_pro' => 'Hardening',
                                    'status_order' => 'not ordered',
                                ],
                                (object) [
                                    'id' => 4,
                                    'element_no' => 'EL004',
                                    'element' => 'name',
                                    'catg' => '3',
                                    'qty' => '1',
                                    'status_pro' => 'Rough Grinding',
                                    'status_order' => 'revived',
                                ],
                                (object) [
                                    'id' => 5,
                                    'element_no' => 'EL005',
                                    'element' => 'name',
                                    'catg' => '3',
                                    'qty' => '1',
                                    'status_pro' => 'Completed',
                                    'status_order' => 'revived',
                                ],
                                // Add more clients as needed
                            ];
                        @endphp

                        @foreach ($elements as $element)
                            <tr>
                                <td>{{ $element->id }}</td>
                                <td>{{ $element->element_no }}</td>
                                <td>{{ $element->element }}</td>
                                <td>{{ $element->catg }}</td>
                                <td>{{ $element->qty }}</td>
                                <td>{{ $element->status_pro }}</td>
                                <td>{{ $element->status_order }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link pr-3" type="button"
                                            id="dropdownMenuButton-{{ $element->id }}" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $element->id }}">
                                            <li><a class="dropdown-item" href="#">edit Elements</a>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Delete Element</a>
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
