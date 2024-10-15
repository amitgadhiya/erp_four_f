@extends('layouts.default')
@section('content')

        <div class="card">
            <div class="card-title p-2 text-center mb-0">
Dashboard
            </div>
            <div class="card-body p-2 col-lg-12">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sales</h4>
                                <canvas id="lineChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Projects</h4>
                                <canvas id="barChart" style="height:230px"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Balance</h4>
                                <canvas id="pieChart" style="height:250px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title p-2 text-center mb-0">
                                Near Expiring Accounts
                            </div>
                            <div class="card-body p-2">
                                <table class="table table-bordered table-striped ">
                                    <tr>
                                        <td>Follow up Date</td>
                                        <td>Contact Person</td>
                                        <td>Course</td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-title p-2 text-center mb-0">
                                Last Question Qpload
                            </div>
                            <div class="card-body p-2">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <td>Date</td>
                                        <td>Desc</td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
@section('script')
<script>
    var Expense = 300;
    var Income = 600;
</script>
<script src="{{ asset(Config::get('vars.adminFolder').'/js/chart.js')}}"></script>
@endsection
