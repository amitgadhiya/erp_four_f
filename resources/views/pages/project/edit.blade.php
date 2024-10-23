@extends('layouts.default')
@section('title')
    Edit project
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <form action="{{ route('element_in_project.list') }}" method="get">
                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="project_no">Project No:</label>
                            <input type="text" class="form-control" id="project_no" name="project_no" required>
                        </div>

                        <div class="form-group">
                            <label for="client_name">Client Name:</label>
                            <input type="text" class="form-control" id="client_name" name="client_name" required>
                        </div>

                        <div class="form-group">
                            <label for="project_end_date">Project End Date:</label>
                            <input type="date" class="form-control" id="project_end_date" name="project_end_date"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="project_name">Project Name:</label>
                            <input type="text" class="form-control" id="project_name" name="project_name" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        {{-- <table class="table">
                            <thead>
                                <tr>
                                    <td>Sr.</td>
                                    <td>Item</td>
                                    <td>Qty</td>
                                    <td>Rate</td>
                                    <td>Discount</td>
                                    <td>Amount</td>
                                    <td>Select</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Item name has to be big fo this like whit will happen if it si very very big will it
                                        go to next line lets see</td>
                                    <td><input type="text" class="form-control" value="1"></td>
                                    <td><input type="text" class="form-control" value="50000"></td>
                                    <td><input type="text" class="form-control" value="10"></td>
                                    <td>45,000</td>
                                    <td><input type="radio" name="item" value="1"></td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Item name has to be big fo this like whit will happen if it si very very big will it
                                        go to next line lets see</td>
                                    <td><input type="text" class="form-control" value="1"></td>
                                    <td><input type="text" class="form-control" value="100000"></td>
                                    <td><input type="text" class="form-control" value="0"></td>
                                    <td>100000</td>
                                    <td><input type="radio" name="item" value="2"></td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Item name has to be big fo this like whit will happen if it si very very big will it
                                        go to next line lets see</td>
                                    <td><input type="text" class="form-control" value="2"></td>
                                    <td><input type="text" class="form-control" value="20000"></td>
                                    <td><input type="text" class="form-control" value="5"></td>
                                    <td>38,000</td>
                                    <td><input type="radio" name="item" value="3"></td>

                                </tr>
                            </tbody>
                        </table> --}}
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
