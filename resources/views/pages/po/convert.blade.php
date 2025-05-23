@extends('layouts.default')
@section('title')
    Make PO
@endsection
@section('content')
<div class="row">

    <div class="col-lg-12">
        <form action="{{ route('projectPOAddPost',request('id')) }}" method="post">
            @csrf
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="client_name">PO Number:</label>
                        <input type="text"  class="form-control" id="po_no" name="po_no" value="{{ $po_number }}" readonly required>
                    </div>
                    <div class="form-group">
                        <label for="project_no">Project No:</label>
                        <input type="text" disabled class="form-control" id="project_no" name="project_no" value="{{ $project->pro_number }}">
                    </div>

                    <div class="form-group">
                        <label for="client_name">Vender Name:</label>
                        <select name="vender" required class="form-control" id="vender">
                            <option value="" selected disabled>select</option>
                            @foreach ($parties as $party)
                            <option value="{{ $party->party_id }}">{{ $party->party_name }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="project_end_date">PO date:</label>
                        <input type="date" class="form-control" id="project_end_date" name="project_end_date" value="{{ date('Y-m-d') }}"
                            required>
                    </div>

                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <table class="table table-bordered table-striped mt-3">
                        <thead  class="table-dark">
                            <tr>
                                <td>Sr.</td>
                                <td>Element Name</td>
                                <td>Material</td>
                                <td>Size</td>
                                <td>Required Qty</td>
                                <td>Action</td>
                                
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($elements as $index => $element)
                            <tr>
                                <td>
                                    <input type="hidden" name="elements[{{ $index }}][id]" class="form-control" value="{{ $element->ele_item_id }}">
                                    <strong>{{$element->ele_code}}</strong></td>
                                <td><strong>{{$element->ele_name }}</strong></td>
                                <td><strong>{{ $element->ele_material}}</strong></td>
                                <td><strong>{{ $element->ele_size }}</strong></td>
                                <td><strong>{{ $element->ele_qty }}</strong></td>
                                <td><input type="checkbox" onchange="toggal_check(this,{{ $index }})" checked name="check[{{ $index }}]" id="check_{{ $index }}"></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <table id="table_{{ $index }}">
                                        <tr>
                                            <td>Type</td>
                                            <td>Width</td>
                                            <td>Base</td>
                                            <td>Height</td>
                                            <td>Weight</td>
                                            <td>Qty</td>
                                            <td>Rate</td>
                                            <td>Tax</td>
                                            <td>Amount</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="elements[{{ $index }}][type]" class="form-control" onchange="toggleFields(this)" required>
                                                    <option value="" disabled selected>Select</option>
                                                    <option value="Plate">Plate</option>
                                                    <option value="Round">Round</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="elements[{{ $index }}][width]" class="form-control" oninput="calculateRow(this)" required></td>
                                            <td><input type="text" name="elements[{{ $index }}][base]" class="form-control" oninput="calculateRow(this)" required></td>
                                            <td><input type="text" name="elements[{{ $index }}][height]" class="form-control" oninput="calculateRow(this)" required></td>
                                            <td class="weight-cell"></td>
                                            <td><input type="text" name="elements[{{ $index }}][qty]" class="form-control" oninput="calculateRow(this)" required></td>
                                            <td><input type="text" name="elements[{{ $index }}][rate]" class="form-control" oninput="calculateRow(this)" required></td>
                                            <td>
                                                <select name="elements[{{ $index }}][tax]" class="form-control"  required>
                                                    <option value="" disabled selected>Select</option>
                                                    @foreach ($taxes as $tax)
                                                    <option value="{{ $tax->tax_id }}">{{ $tax->tax_name }}</option>
                                                    @endforeach
                                                    
                                                </select>
                                            </td>
                                            <td class="amount-cell"></td>
                                        </tr>
                                    </table>

                                </td>
                                
                            </tr>
                            @endforeach
                            
                            
                        </tbody>
                    </table>
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
<script>
    const density = 7.85; // g/cm³ for steel

    function toggleFields(select) {
    const row = select.closest('tr');
    const type = select.value;

    // Select the inputs for width, base, and height
    const widthInput = row.querySelector('input[name*="[width]"]');
    const baseInput = row.querySelector('input[name*="[base]"]');
    const heightInput = row.querySelector('input[name*="[height]"]');

    // Show/hide fields based on the selection
    if (type === 'Plate') {
        // Show all fields for Plate (Width, Base, Height)
        widthInput.style.display = '';  // Show Width
        baseInput.style.display = '';   // Show Base
        heightInput.style.display = ''; // Show Height
        baseInput.required = true;
    } else if (type === 'Round') {
        // Show only Width and Height for Round, hide Base
        widthInput.style.display = '';  // Show Width
        baseInput.style.display = 'none'; // Hide Base
        baseInput.required = false;
        heightInput.style.display = ''; // Show Height
        baseInput.value = ''; // Clear Base input value
    } else {
        // Reset all fields
        widthInput.style.display = '';  // Show Width
        baseInput.style.display = '';   // Show Base
        heightInput.style.display = ''; // Show Height
    }
}

function calculateRow(el) {
    const row = el.closest('tr');
    const type = row.querySelector('select[name^="elements"]').value;

    const width = parseFloat(row.querySelector('input[name$="[width]"]').value) || 0;
    const base = parseFloat(row.querySelector('input[name$="[base]"]').value) || 0;
    const height = parseFloat(row.querySelector('input[name$="[height]"]').value) || 0;
    const qty = parseFloat(row.querySelector('input[name$="[qty]"]').value) || 0;
    const rate = parseFloat(row.querySelector('input[name$="[rate]"]').value) || 0;

    let weight = 0;

    if (type === 'Round') {
        // Formula for Round: π * d² * L * ρ / 4
        // Calculate volume of the cylinder (round) in cubic cm
        weight = (Math.PI * Math.pow(width / 2, 2) * height * density);  // kg to grams since density is in g/cm³
    } else if (type === 'Plate') {
        // Formula for Plate: W * B * T * ρ
        weight = (width * base * height * density); // Simple calculation for plate
    }

    // Update weight in the row
    row.querySelector('.weight-cell').innerText = weight.toFixed(2);  // Display weight with 2 decimal places
    row.querySelector('.amount-cell').innerText = (qty * rate).toFixed(2);  // Calculate and display amount
}
function toggal_check(ch, index) {
    const checkbox = document.getElementById('check_' + index);
    const table = document.getElementById('table_' + index);
    const inputs = table.querySelectorAll('input, select');

    if (checkbox.checked) {
        table.style.display = 'table';
        inputs.forEach(input => {
            input.disabled = false;
        });
    } else {
        table.style.display = 'none';
        inputs.forEach(input => {
            input.disabled = true;
        });
    }
}
</script>
@endsection