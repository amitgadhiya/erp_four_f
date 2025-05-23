@extends('layouts.default')
@section('title')
    GRN List
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <td>Sr</td>
                    <td>Gate Entery No</td>
                    <td>Date</td>
                    <td>Party</td>
                    <td>Ref type</td>
                    <td>Ref No</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($ges as $ge)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$ge->ge_number}}</td>
                    <td>{{$ge->ge_date}}</td>
                    <td>{{$ge->party->party_name}}</td>
                    <td>{{$ge->ge_ref_type}}</td>
                    <td>{{$ge->ge_ref_number}}</td>
                    <td>
                        <a href="{{route('grnView',$ge->ge_id)}}" class="btn btn-primary">Convert To GRN</a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>
@endsection
