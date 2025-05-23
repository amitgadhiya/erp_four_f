@extends('layouts.default')
@section('title')
    Add PO
@endsection
@section('content')
    <div class="row">

        <div class="col-lg-12">
            <form action="{{ route('poAddPost') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label for="project_no">PO No:</label>
                            <input type="text" class="form-control" id="po_number" name="po_number" value="{{$po_number}}" readonly required>
                        </div>

                        

                        <div class="form-group">
                            <label for="project_end_date">PO Date:</label>
                            <input type="date" class="form-control" id="po_date" name="po_date" value="{{date('Y-m-d')}}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="project_name">PO type:</label>
                            <select name="po_type" class="form-control" id="po_type">
                                <option value="" selected disabled>select</option>
                                <option value="Capex">Capex</option>
                                <option value="Salable purchase for new Project">Salable purchase for new Project</option>
                                <option value="Salable purchase for new Project">Salable purchase for inventory</option>
                                <option value="Salable purchase for rejection">Salable purchase for rejection</option>
                                <option value="alable service taken from supplier">Salable service taken from supplier</option>
                                <option value="Salable purchase for other">Salable purchase for other</option>
                                <option value="Maintenance">Maintenance</option>
                                <option value="Tooling">Tooling</option>
                                <option value="Consumable">Consumable</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="client_name">Vender Name:</label>
                            <select name="po_party_id" class="form-control" id="po_party_id">
                                <option value="" selected disabled>select</option>
                                @foreach ($parties as $party)
                                <option value="{{$party->party_id}}">{{$party->party_name}}</option>
                                @endforeach
                                
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="project_end_date">Remark:</label>
                            
                            <textarea name="po_remark" class="form-control"  id="po_remark" cols="30" rows="10"></textarea>
                        </div>
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
@endsection
