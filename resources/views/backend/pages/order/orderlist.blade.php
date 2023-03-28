@extends('backend.master')
@section('contents')

<h3 style="font-size: xx-large;">Order List</h3>

<table class="table">

    <thead class="table-dark">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">User Name</th>
            <th scope="col">Order Receiver Name</th>
            <th scope="col">Order Email</th>
            <th scope="col">Order Phone</th>
            <th scope="col">Order Amount</th>
            <th scope="col">Status</th>
            <th scope="col">Order Address</th>
            <th scope="col">Transaction ID</th>
            <th scope="col">Currency</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Orders as $Order)
        <tr>
            <th scope="row">{{$Order->id}}</th>
            <td>{{$Order->user->name}}</td>
            <td>{{$Order->name}}</td>
            <td>{{$Order->email}}</td>
            <td>{{$Order->phone}}</td>
            <td>{{$Order->amount}}</td>
            <td>{{$Order->status}}</td>
            <td>{{$Order->address}}</td>
            <td>{{$Order->transaction_id}}</td>
            <td>{{$Order->currency}}</td>
            <td>
                <a type="submit" href="{{route('order.update', $Order->id)}}" class="btn btn-outline-success">Approve</a>
                <a type="submit" href="{{route('order.reciept', $Order->id)}}" class="btn btn-outline-dark">Order Reciept</a>
                <a type="submit" href="{{route('dot.create', $Order->id)}}" class="btn btn-outline-dark">Order Track</a>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>

{{$Orders->Links()}}

@endsection