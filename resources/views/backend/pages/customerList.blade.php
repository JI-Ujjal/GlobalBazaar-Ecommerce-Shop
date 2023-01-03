@extends('backend.master')
@section('contents')
<div>
    <h3>Customer Table</h3>
    <a class="btn btn-success" href="{{route('customer.create.form')}}"> Create </a>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Category Name</th>
                <th scope="col">Status</th>
                <th scope="col">Details</th>
                <th scope="col">Price</th>
                <th scope="col">Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Customer as $Customer)
            <tr>
                <th scope="row">{{$Customer->id}}</th>
                <td>{{$Customer->customer_name}}</td>
                <td>{{$Customer->customer_status}}</td>
                <td>{{$Customer->customer_details}}</td>
                <td>{{$Customer->customer_price}}</td>
                <td>
                    <a class="btn btn-primary" href="{{route('edit.customer',$Customer->id)}}">edit</a>
                    <a class="btn btn-danger" href="{{route('delete.customer',$Customer->id)}}">Delete</a>
                <td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection