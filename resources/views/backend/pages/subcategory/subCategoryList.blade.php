@extends('backend.master')
@section('contents')
<h3>Sub-Category List</h3>

<a class="btn btn-success" href="{{ route('sub.category.create.form') }}">Create</a>

@if (session()->has('message'))

<p class="alert alert-primary">{{session()->get('message')}}</p>
    
@endif
<table class="table">
    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Email Address</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Subcategory as $Subcategory)
        <tr>
            <th scope="row">{{ $Subcategory->id }}</th>
            <td>{{ $Subcategory->email_address }}</td>
            <td>{{ $Subcategory->password }}</td>
            <td>
                <a class="btn btn-primary" href="{{ route('edit.sub.category', $Subcategory->id) }}">Edit</a>
                <a class="btn btn-success" href="{{ route('view.sub.category', $Subcategory->id) }}">View</a>
                <a class="btn btn-danger" href="{{ route('delete.sub.category', $Subcategory->id) }}">Delete</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
@endsection