@extends('layouts.default')
@section('title')
    Issue Project List
@endsection
@section('content')
<table class="table table-striped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th>Sr. No.</th>
            <th>Client Name</th>
            <th>Project No.</th>
            <th>Total Elements</th>
            <th>Issued Elements</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Example Rows -->
        <tr>
            <td>1</td>
            <td>ABC Pvt Ltd</td>
            <td>PRJ001</td>
            <td>100</td>
            <td>50</td>
            <td>
                <a href="{{ route('issue-elements.list')}}" class="btn btn-primary btn-sm">View</a>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>XYZ Enterprises</td>
            <td>PRJ002</td>
            <td>200</td>
            <td>150</td>
            <td>
                <a href="{{ route('issue-elements.list')}}" class="btn btn-primary btn-sm">View</a>
            </td>
        </tr>
    </tbody>
</table>

@endsection
