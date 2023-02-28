@extends('backend.master')
@section('contents')

<div>

    <p style="font-size: xx-large;">User List</p>
    <div style="padding-top: 10px;">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Password</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($Users as $User)
                <tr>
                    <th scope="row">{{ $User->id }}</th>
                    <td>{{ $User->name }}</td>
                    <td>{{ $User->email }}</td>
                    <td>{{ $User->role }}</td>
                    <td>{{ $User->password }}</td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</div>




@endsection