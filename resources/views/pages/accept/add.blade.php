@extends('layouts.default')
@section('title')
    Accept Item
@endsection
@section('content')

<div class="row">
    <div class="col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <td>Sr</td>
                    <td>Date</td>
                    <td>Item</td>
                    <td>Qty</td>
                    <td>By department</td>
                    <td>By User</td>
                    <td>Action</td>

                    
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>05-12-2024</td>
                    <td>Itme name <br>
                    item desc, make and size
                    </td>
                    <td>1</td>
                    <td>Store</td>
                    <td>User name</td>
                    <td><a href="#" class="btn btn-primary mt-3">Accept</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>05-12-2024</td>
                    <td>Itme name <br>
                    item desc, make and size
                    </td>
                    <td>1</td>
                    <td>Store</td>
                    <td>User name</td>
                    <td><a href="#" class="btn btn-primary mt-3">Accept</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>05-12-2024</td>
                    <td>Itme name <br>
                    item desc, make and size
                    </td>
                    <td>1</td>
                    <td>Store</td>
                    <td>User name</td>
                    <td><a href="#" class="btn btn-primary mt-3">Accept</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection
