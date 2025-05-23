@extends('layouts.default')
@section('title')
    Add Quotation
@endsection
@section('content')
<form action="{{ route('quotationAddPost') }}" method="post">
    @csrf
    <input type="hidden" name="enquiry_id" value="{{ $enq->enq_id }}">
    <div class="row">
        <div class="col-lg-3">
            <div class="mb-3">
                <label class="form-label">Quotation No</label>
                <input type="text" class="form-control" name="quotation_no" required readonly value="{{ $quotation_no }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Client Name</label>
                <input type="text" class="form-control" name="client_name" readonly value="{{ $enq->party->party_name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="date" required value="{{ date('Y-m-d') }}">
            </div>
        </div>
        <div class="col-lg-3">
            <div class="mb-3">
                <label class="form-label">Remark</label>
                
                <textarea name="quot_remake" class="form-control" id="quot_remake" cols="30" rows="10"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <tr>
                    <th>SR.</th>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Tax</th>
                </tr>
                @foreach ($enqds as $enqd)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        
                        <input type="text"  name="items[]" class="form-control" value="{{ $enqd->enqd_product }}" >
                    </td>
                    <td>
                        
                        <input type="text" name="qty[]" class="form-control" value="{{ $enqd->enqd_qunt }}" >
                    </td>
                    <td>
                        <input type="number" step="0.01" class="form-control" name="rate[]" required>
                    </td>
                    <td>
                        <select class="form-select" name="tax[]" required>
                            <option value="">Select</option>
                            @foreach ($taxs as $tax)
                            <option value="{{$tax->tax_id}}">{{$tax->tax_name}}</option>
                            @endforeach
                        </select>
                        
                    </td>
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-3">
            <button type="submit" class="btn btn-primary">Add Quotation</button>
            <a href="{{ route('quotation') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>


@endsection
@section('script')

@endsection