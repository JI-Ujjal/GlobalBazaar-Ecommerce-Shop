@extends('backend.master')
@section('contents')
<div>
    <h3>Product List</h3>

    <a class="btn btn-success" href="{{route('product.create.form')}}">Create</a>

    @if(session()->has('message'))

    <p class="alert alert-success">{{session()->get('message')}}</p>

    @endif

    <table class="table">

        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Email Address</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Product as $Product)
            <tr>
                <th scope="row">{{$Product->id}}</th>
                <td>{{$Product->email_address}}</td>
                <td>{{$Product->password}}</td>
                <td><a class="btn btn-success" href="{{route('edit.product', $Product->id)}}">Edit</a>
                    <a class="btn btn-primary" href="{{route('view.product', $Product->id)}}">view</a>
                    <a class="btn btn-danger" href="{{route('delete.product', $Product->id)}}">Delete</a>


                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection