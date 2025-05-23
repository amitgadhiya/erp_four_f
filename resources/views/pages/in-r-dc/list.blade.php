@extends('layouts.default')
@section('title')
    Inward Returnable DC
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 text-right">
        <a class="btn btn-primary" href="{{route('in-r-dc.add')}}">Add</a>
    </div>
</div>
<div class="row mt-3">
    <div class="col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <td>Sr</td>
                    <td>DC Date(Cust)</td>
                    <td>DC No(Cust)</td>
                    <td>Customer Name</td>
                    <td>Reason</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>05-12-2024</td>
                    <td>DC-ABC-123</td>
                    <td>Customer Name</td>
                    <td>Component</td>
                    <td>Open</td>
                    <td>
                        <a href="{{route('in-r-dc.edit')}}">Edit</a> | 
                        <a href="{{route('in-r-dc.item-list')}}">Manage</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
