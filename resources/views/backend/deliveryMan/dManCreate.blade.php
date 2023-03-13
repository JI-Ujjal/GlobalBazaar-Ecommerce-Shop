@extends('backend.master')
@section('contents')

<div class="container">
    <h3 style="font-size: 30px">Delivery Man List</h3>

    <form action="{{ route('delivery.man.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Delivery Man Name</label>
            <input type="text" name="man_name" class="form-control" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="man_image" class="form-control" placeholder="Enter Image">
        </div>

        <div class="form-group">
            <label for="">Email</label>
            <input type="text" name="man_email" class="form-control" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label for="">Number</label>
            <input type="text" name="man_number" class="form-control" placeholder="Enter Number">
        </div>

        <div class="from-group" style="padding: 10px;">
            <label for="">Service Status</label>
            <select name="man_status" class="from-control" id="">
                <option selected>Choose...</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection