@extends('backend.master')
@section('contents')
<div class="container">
    <h3 style="font-size: 30px">Category Create Form</h3>
    <form action="{{ route('submit.form') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" name="category_name" required class="form-control" placeholder="Enter Category Name">
        </div>

        <div class="form-group">
            <label for="">Category Details</label>
            <input type="text" name="category_details" required class="form-control" placeholder="Enter Category Details">
        </div>

        <div class="from-group" style="padding: 10px;">
            <label for="">Category Status</label>
            <select name="category_status" required class="from-control" id="">
                <option selected>Choose...</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection