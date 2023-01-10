@extends('backend.master')
@section('contents')

<div>

    <h3>Customer View</h3>
    <div>
    <label for="exampleInputEmail1">Customer Name</label>
        <input type="text" name="customer_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your order amount" value="{{$Customer->customer_name}}">
    </div>
    <div>
    <label for="exampleInputEmail1">Customer Image</label>
        <input type="file" name="customer_image" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter your order image" value="{{$Customer->customer_image}}">
    </div>
    <div>
    <label for="exampleInputPassword1">Customer Order</label>
        <input type="text" name="customer_order" class="form-control" id="exampleInputPassword1"
            placeholder="Which Product?" value="{{$Customer->customer_order}}">
    </div>
    <div>
    <label for="exampleInputPassword1">Customer Address</label>
        <input type="text"  name="customer_address" class="form-control" id="exampleInputPassword1"
            placeholder="Enter your address" value="{{$Customer->customer_address}}">
    </div>

</div>

@endsection()