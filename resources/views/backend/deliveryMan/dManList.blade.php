@extends('backend.master')
@section('contents')

<div>

    <p style="font-size: xx-large;">Delivery Man List</p>
    <a class="btn btn-success" href="{{ route('delivery.man.create') }}">Delivery Man Create</a>

    @if(session()->has('message'))

    <p class="alert alert-success">{{session()->get('message')}}</p>

    @endif

    <div style="padding-top: 10px;">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Status</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($deliverymans as $key=>$deliveryman)
                <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $deliveryman->man_name }}</td>
                    <td><img width="70px" src="{{url('uploads/deliveryMan', $deliveryman->man_image)}}" alt="" srcset=""></td>
                    <td>{{ $deliveryman->man_email }}</td>
                    <td>{{ $deliveryman->man_number }}</td>
                    <td><a class="btn btn-outline-primary" href="">Edit</a>
                        <a class="btn btn-outline-success" href="">View</a>
                        <a class="btn btn-outline-danger" href="">Delete</a>
                    </td>

                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    {{$deliverymans->Links()}}

</div>


@endsection