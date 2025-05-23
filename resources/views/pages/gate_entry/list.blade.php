@extends('layouts.default')
@section('title')
    Gate Entery
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12 text-right">
        <a href="{{route('gateEntryAdd')}}" class="btn btn-success">Add</a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12">
        <table class="table">
            <tr>
                <td>Sr.</td>
                <td>Entery No</td>
                <td>Date</td>
                <td>Party</td>
                <td>Ref Doc.</td>
                <td>Ref No.</td>
                <td>Action</td>
            </tr>
            @foreach ($enteries as $entry)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$entry->ge_number}}</td>
                <td>{{$entry->ge_date}}</td>
                <td>{{$entry->party->party_name}}</td>
                <td>{{$entry->ge_ref_type}}</td>
                <td>{{$entry->ge_ref_number}}</td>
                <td>
                    <a href="{{route('gateEntryItem',$entry->ge_id)}}">Manage</a> | <a href="{{route('gateEntryEdit',$entry->ge_id)}}">Edit</a> | <a href="{{route('gateEntryDelete',$entry->ge_id)}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
