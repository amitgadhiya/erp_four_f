@extends('layouts.default')
@section('title')
    Convert to project
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <form action="{{ route('projectAddPost') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="project_no">Project No:</label>
                            <input type="text" class="form-control" id="pro_no" name="pro_no" value=""  required>
                        </div>
                        <div class="form-group">
                            <label for="client_name">Customer Name:</label>
                            <input type="text" class="form-control" id="pro_client" name="pro_client" value="{{$quot->party->party_name}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="project_no">Project Name:</label>
                            <input type="text" class="form-control" id="pro_name" name="pro_name"  required>
                        </div>
                        <div class="form-group">
                            <label for="project_no">Project Description:</label>
                            <textarea name="pro_desc" id="pro_desc" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="client_name">Category</label>
                            <select name="item_catg_id" class="form-control" id="item_catg_id" required>
                                <option value="" disabled selected>Select</option>
                                @foreach ($catgs as $catg)
                                <option value="{{$catg->ic_id}}" >{{$catg->ic_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="client_name">Unit</label>
                            <select name="item_unit_id" class="form-control" id="item_unit_id" required>
                                <option value="" disabled selected>Select</option>
                                @foreach ($units as $unit)
                                <option value="{{$unit->unit_id}}" >{{$unit->unit_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="project_end_date">Project End Date:</label>
                            <input type="date" class="form-control" id="pro_end_date" name="pro_end_date"
                                required>
                        </div>
                    
                        <div class="form-group">
                            <label for="project_end_date">PO Date</label>
                            <input type="date" class="form-control" id="pro_po_date" name="pro_po_date"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="client_name">PO Number:</label>
                            <input type="text" class="form-control" id="pro_po_number" name="pro_po_number" required>
                        </div>
                        
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="client_name">Input Status</label>
                            <select name="pro_input" class="form-control" id="pro_input" required>
                                <option value="" disabled selected>Select</option>
                                <option value="Pending">Pending</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="client_name">DAP Status</label>
                            <select name="pro_dap" class="form-control" id="pro_dap" required>
                                <option value="" disabled selected>Select</option>
                                <option value="Load">Load</option>
                                <option value="Inprocess">Inprocess</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="client_name">DAP Approval Status</label>
                            <select name="pro_dap_app" class="form-control" id="pro_dap_app" required>
                                <option value="" disabled selected>Select</option>
                                <option value="Pending">Pending</option>
                                <option value="Received">Received </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="client_name">FInal</label>
                            <select name="pro_final" class="form-control" id="pro_final" required>
                                <option value="" disabled selected>Select</option>
                                <option value="Load">Load</option>
                                <option value="Inprocess">Inprocess</option>
                                <option value="Complete">Complete</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-bordered table-striped mt-3">
                            <thead class="table-dark">
                                <tr>
                                    <td>Sr.</td>
                                    <td>Item</td>
                                    <td>Qty</td>
                                    <td>Rate</td>
                                    <td>Discount</td>
                                    
                                    <td>Select</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quot->items as $index => $item)
                                    
                                <input type="hidden" class="form-control" value="{{$item->qd_id}}" name="items[{{ $index }}][qd_id]">
                                <tr>
                                    <td>{{$index+1}}</td>
                                    <td>{{$item->qd_name}}</td>
                                    <td><input type="text" class="form-control" value="{{$item->qd_qty}}" name="items[{{ $index }}][qd_qty]"></td>
                                    <td><input type="text" class="form-control" value="{{$item->qd_rate}}" name="items[{{ $index }}][qd_rate]"></td>
                                    <td><input type="text" class="form-control" value="{{$item->qd_discount}}" name="items[{{ $index }}][qd_discount]"></td>
                                    
                                    
                                    <td><input type="radio" name="item" value="{{ $index }}" required></td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
