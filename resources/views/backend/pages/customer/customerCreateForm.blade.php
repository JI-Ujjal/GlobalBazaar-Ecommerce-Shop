@extends('backend.master')
@section('contents')

<div>
    <h3>Customer Create Form</h3>
    <form action="{{route('customer.submit.form')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Customer Name</label>
        <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter your name" >
            @error('customer_name')<div class="alert alert-danger">{{$message}}</div>@enderror

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Customer Image</label>
        <input type="file" name="customer_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter your order image">
            @error('customer_image')<div class="alert alert-danger">{{$message}}</div>@enderror

    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Customer Order</label>
        <input type="text" name="customer_order" class="form-control" id="exampleInputPassword1"
            placeholder="Which Product?">
            @error('customer_order')<div class="alert alert-danger">{{$message}}</div>@enderror

    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Customer Address</label>
        <input type="text"  name="customer_address" class="form-control" id="exampleInputPassword1"
            placeholder="Enter your address">
            @error('customer_address')<div class="alert alert-danger">{{$message}}</div>@enderror

    </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection