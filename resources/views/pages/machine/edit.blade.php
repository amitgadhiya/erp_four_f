@extends('layouts.default')
@section('title')
    Edit Machine
@endsection
@section('content')

<form action="{{ route('machineEditPost', $machine->mach_id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="name" class="form-label">Machine Name</label>
                <input type="text" class="form-control" id="mach_name" name="mach_name" value="{{ $machine->mach_name }}" required>
            </div>
            <div class="mb-3">
                <label for="number" class="form-label">Number</label>
                <input type="text" class="form-control" id="mach_no" name="mach_no" value="{{ $machine->mach_no }}" required>
            </div>
            <div class="mb-3">
                <label for="make" class="form-label">Make</label>
                <input type="text" class="form-control" id="mach_make" name="mach_make" value="{{ $machine->mach_make }}" required>
            </div>
            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="mach_model" name="mach_model" value="{{ $machine->mach_model }}" required>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-6">
            <div class="mb-3">
                <label for="specifications" class="form-label">Specifications</label>
                <textarea class="form-control" id="mach_spec" name="mach_spec" rows="4">{{ $machine->mach_spec }}</textarea>
            </div>
            <div class="mb-3">
                <label for="purchase_date" class="form-label">Purchase Date</label>
                <input type="date" class="form-control" id="mach_install_date" name="mach_install_date" value="{{ $machine->mach_install_date }}" required>
            </div>

            <div class="mb-3">
                <label for="user_manual" class="form-label">Setting</label>
                <input type="file" class="form-control" id="mach_setting" name="mach_setting" accept=".pdf,.doc,.docx,.zip,.rar">
                @if ($machine->mach_setting)
                    <a href="{{ asset('storage/' . $machine->mach_setting) }}" target="_blank" class="btn btn-sm btn-success mt-2">Download</a>
                @endif
            </div>

            <div class="mb-3">
                <label for="warranty_card" class="form-label">Warranty Card</label>
                <input type="file" class="form-control" id="mach_warranty" name="mach_warranty" accept=".pdf,.jpg,.png,.zip,.rar">
                @if ($machine->mach_warranty)
                    <a href="{{ asset('storage/' . $machine->mach_warranty) }}" target="_blank" class="btn btn-sm btn-success mt-2">Download</a>
                @endif
            </div>

            <div class="mb-3">
                <label for="invoice" class="form-label">Invoice</label>
                <input type="file" class="form-control" id="mach_invoice" name="mach_invoice" accept=".pdf,.jpg,.png,.zip,.rar">
                @if ($machine->mach_invoice)
                    <a href="{{ asset('storage/' . $machine->mach_invoice) }}" target="_blank" class="btn btn-sm btn-success mt-2">Download</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Buttons -->
    <div class="mt-3">
        <button type="submit" class="btn btn-primary">Update Machine</button>
        <a href="{{ route('machine') }}" class="btn btn-secondary">Cancel</a>
    </div>
</form>


@endsection
@section('script')

@endsection