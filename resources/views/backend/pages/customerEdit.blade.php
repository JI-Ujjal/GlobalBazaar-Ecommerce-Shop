@extends('backend.master')
@section('contents')

<div>
    <h3>Customer Update Form</h3>
    <form action="{{route('update.customer', $Customer->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
    <label for="customer_name">Customer Name</label>
    <input name="customer_name" type="text" class="form-control" placeholder="Enter Category Name" value="{{$Customer->customer_name}}">
   
  </div>

  <div class="form-group">
            <label for="customer_status">Select Customer Status</label>
            <select name="status" id="customer_status" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>

  </div>

  <div class="form-group">
    <label for="customer_details">Customer Details</label>
    <textarea name="customer_details" class="form-control" id="customer_details" cols="10" rows=""></textarea>
   
  </div>

  <div class="form-group">
    <label for="customer_price">Customer Price</label>
    <input min="0" name="customer_price" type="number" class="form-control" id="customer_price" placeholder="Enter Customer Price" value="{{$Customer->customer_price}}">
   
  </div>
  <button type="submit" class="btn btn-warning">Update</button>
</form>
</div>

@endsection