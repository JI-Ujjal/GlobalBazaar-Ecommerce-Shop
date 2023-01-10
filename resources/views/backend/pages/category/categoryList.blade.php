@extends('backend.master')
@section('contents')
<h3>Category List</h3>
<a class="btn btn-success" href="{{ route('create.form') }}">Create</a>

@if(session()->has('message'))

<p class="alert alert-success">{{session()->get('message')}}</p>

@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">#Id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Category Image</th>
            <th scope="col">Category Details</th>
            <th scope="col">Category Status</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Categories as $Category)
        <tr>
            <th scope="row">{{ $Category->id }}</th>
            <td>{{ $Category->category_name }}</td>
            <td><img width="70px" src="{{ url('uploads/category', $Category->category_image) }}" alt="" srcset=""></td>
            <td>{{ $Category->category_details }}</td>
            <td>{{ $Category->category_status }}</td>
            <td><a class="btn btn-primary" href="{{route('edit.category',$Category->id)}}">Edit</a>
                <a class="btn btn-success" href="{{ route('view.category', $Category->id) }}">View</a>
                <a class="btn btn-danger" href="{{ route('delete.category', $Category->id) }}">Delete</a>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
{{$Categories->links()}}
@endsection