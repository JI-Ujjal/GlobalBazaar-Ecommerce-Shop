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
                <th scope="col">#Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Product Image</th>
                <th scope="col">Product Details</th>
                <th scope="col">Product Price</th>
                <th scope="col">Product Quantity</th>
                <th scope="col">Product Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Products as $Product)
            <tr>
                <th scope="row">{{$Product->id}}</th>
                <td>{{$Product->product_name}}</td>
                <td>{{$Product->categories->category_name}}</td>
                <td><img width="70px" src="{{url('uploads/product', $Product->product_image)}}" alt="" srcset=""></td>
                <td>{{$Product->product_details}}</td>
                <td>{{$Product->product_price}}</td>
                <td>{{$Product->product_quantity}}</td>
                <td>{{$Product->product_status}}</td>
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