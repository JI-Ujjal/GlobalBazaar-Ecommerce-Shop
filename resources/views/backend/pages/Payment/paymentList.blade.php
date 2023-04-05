@extends('backend.master')
@section('contents')

<div>
    <h3 style="font-size: 30px;">Payment List</h3>

    @if(session()->has('message'))

    <p class="alert alert-success">{{session()->get('message')}}</p>

    @endif

    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Order Id</th>
                <th scope="col">User Id</th>
                <th scope="col">Transection Id</th>
                <th scope="col">Amount</th>
                <th scope="col">Action</th>


            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $key=>$payment)
            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$payment->id}}</td>
                <td>{{$payment->user_id}}</td>
                <td>{{$payment->transaction_id}}</td>
                <td>{{$payment->amount}} BDT</td>
                <td>
                    <a class="btn btn-danger" href="">Delete</a>
                <td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$payments->links()}}
</div>
@endsection