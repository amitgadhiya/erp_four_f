@extends('layouts.default')
@section('title')
    Issue Project List
@endsection
@section('content')
<form action="submit_elements.php" method="POST">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Sr. No.</th>
                <th>Element Number</th>
                <th>Quantity Required</th>
                <th>Quantity Given</th>
                <th>Quantity to Give</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example Rows -->
            <tr>
                <td>1</td>
                <td>ELM001</td>
                <td>100</td>
                <td>50</td>
                <td><input type="number" name="quantity_to_give[]" class="form-control" min="0" required></td>
                <td><input type="checkbox" name="select_element[]" value="ELM001"></td>
            </tr>
            <tr>
                <td>2</td>
                <td>ELM002</td>
                <td>200</td>
                <td>120</td>
                <td><input type="number" name="quantity_to_give[]" class="form-control" min="0" required></td>
                <td><input type="checkbox" name="select_element[]" value="ELM002"></td>
            </tr>
        </tbody>
    </table>

    <!-- Department Selection -->
    <div class="form-group">
        <label for="department">Select Department:</label>
        <select name="department" id="department" class="form-control" required>
            <option value="">-- Select Department --</option>
            <option value="production">Production</option>
            <option value="quality">Quality Control</option>
            <option value="logistics">Logistics</option>
            <option value="sales">Sales</option>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

@endsection
