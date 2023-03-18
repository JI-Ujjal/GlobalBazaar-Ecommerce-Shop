@extends('backend.master')
@section('contents')

<div class="container">
    <h3 style="font-size: 30px">Delivery Order Tracking List Create</h3>

    <form action="{{ route('dot.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Order</label>
            <select name="order_id" class="form-control" placeholder="Enter Order Id">
                @foreach ($Orders as $Order)

                <option value="{{$Order->id}}">{{$Order->id}}</option>

                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Delivery Man Name</label>
            <select name="man_name" class="form-control" placeholder="Enter Man Name">
                @foreach ($deliverymans as $deliveryman)

                <option value="{{$deliveryman->id}}">{{$deliveryman->man_name}}</option>

                @endforeach
            </select>
        </div>

        <div class="from-group" style="padding: 10px;">
            <label for="">Tracking Status</label>
            <select name="status" class="from-control" id="">
                <option selected>Choose...</option>
                <option value="Order_Process">Order Process</option>
                <option value="Order_Shipped">Order Shipped</option>
                <option value="Order_EN_Route">Order EN Route</option>
                <option value="Order_Arrived">Order Arrived</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection