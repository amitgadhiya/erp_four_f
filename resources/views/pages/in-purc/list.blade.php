@extends('layouts.default')
@section('title')
    Purchase Inward
@endsection
@section('content')
{{-- <div class="row">
    <div class="col-lg-12 text-right">
        <a class="btn btn-primary" href="{{route('in-purc.add')}}">Add</a>
    </div>
</div> --}}
<div class="row mt-3">
    <div class="col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <td>Sr</td>
                    <td>PO Date</td>
                    <td>PO No</td>
                    <td>Vender Name</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>05-12-2024</td>
                    <td>PO-ABC-123</td>
                    <td>Party Name</td>
                    <td>Open</td>
                    <td>
                        <a href="{{route('in-purc.in')}}">In</a> 
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
