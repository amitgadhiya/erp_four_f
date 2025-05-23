@extends('layouts.default')
@section('title')
    GRN Convert
@endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <form action="{{route('grnBook',request('id'))}}" method="post">
            @csrf
        <div class="row">
            <div class="col-lg-4">
                <table class="table">
                    
                    <tr>
                        <td>
                            @if ($ge->ge_ref_type == "Invoice")Invoice No @endif
                            @if ($ge->ge_ref_type == "DC")DC No @endif
                        </td>
                        <td>{{$ge->ge_ref_number}}</td>
                    </tr>
                    
                    
                    
                    
                    <tr>
                        <td>
                            @if ($ge->ge_ref_type == "Invoice")Invoice Date @endif
                            @if ($ge->ge_ref_type == "DC")DC Date @endif
                        </td>
                        <td>{{$ge->ge_date}}</td>
                    </tr>
                    <tr>
                        <td>Party</td>
                        <td>{{$ge->party->party_name}}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <table class="table">
                    <thead>
                        <tr>
                            <td>Sr</td>
                            <td>Item</td>
                            <td>Qty</td>
                            <td>Rate</td>
                            <td>Tax</td>
                            <td>Amount</td>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($geis as $gei)
                            
                        
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$gei->item->item_name}}</td>
                            <td>{{$gei->gei_qty}}</td>
                            <td>{{$gei->gei_rate}}</td>
                            <td>{{$gei->tax->tax_name ?? ""}}</td>
                            <td>{{$gei->gei_qty * $gei->gei_rate}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <input type="submit" class="btn btn-primary" value="Book GRN">
            </div>
        </div>
    </form>
    </div>
</div>

@endsection
