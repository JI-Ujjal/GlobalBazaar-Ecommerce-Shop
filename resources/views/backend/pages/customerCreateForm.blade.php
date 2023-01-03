@extends('backend.master')
@section('contents')

<div>
    <h3>Customer Create Form</h3>
    <form action="{{route('customer.submit.form')}}" method="POST">
        @csrf
  <div class="form-group">
    <label for="customer_name">Customer Name</label>
    <input name="customer_name" type="text" class="form-control" placeholder="Enter Category Name">
   
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
    <input min="0" name="customer_price" type="number" class="form-control" id="customer_price" placeholder="Enter Category Name">
   
  </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection