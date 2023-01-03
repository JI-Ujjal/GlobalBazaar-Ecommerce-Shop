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
            <th scope="col">Id</th>
            <th scope="col">Email Address</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($Category as $Category)
        <tr>
            <th scope="row">{{ $Category->id }}</th>
            <td>{{ $Category->email_address }}</td>
            <td>{{ $Category->password }}</td>
            <td><a class="btn btn-success" href="{{ route('view.category', $Category->id) }}">View</a>
                <a class="btn btn-primary" href="{{route('edit.category',$Category->id)}}">Edit</a>
                <a class="btn btn-danger" href="{{ route('delete.category', $Category->id) }}">Delete</a>
            </td>

        </tr>
        @endforeach

    </tbody>
</table>
@endsection