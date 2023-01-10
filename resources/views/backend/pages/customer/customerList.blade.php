@extends('backend.master')
@section('contents')
<div>
    <h3>Customer Table</h3>
    <a class="btn btn-success" href="{{route('customer.create.form')}}"> Create </a>
    
    @if(session()->has('message'))
    <p class="alert alert-success">{{session()->get('message')}}</p>
    @endif


    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Customer Image</th>
                <th scope="col">Customer Order</th>
                <th scope="col">Customer Address</th>
                <th scope="col">Edit/Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Customers as $Customer)
            <tr>
                <th scope="row">{{$Customer->id}}</th>
                <td>{{$Customer->customer_name}}</td>
                <td><img width="70px" src="{{ url('uploads/customer', $Customer->customer_image) }}" alt="" srcset=""></td>
                <td>{{$Customer->customer_order}}</td>
                <td>{{$Customer->customer_address}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('edit.customer',$Customer->id)}}">edit</a>
                    <a class="btn btn-primary" href="{{route('view.customer',$Customer->id)}}">view</a>
                    <a class="btn btn-danger" href="{{route('delete.customer',$Customer->id)}}">Delete</a>
                <td>
            </tr>
            @endforeach 
    </table>
</div>

{{$Customers->links()}}

@endsection