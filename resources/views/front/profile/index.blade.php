@extends('front.layouts.master')

@section('content')

    <h2>Profile</h2>
    <hr>
    <h3>User Details</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">
                  User Details <a href="" class="float-right"><i class="fa fa-cogs"></i> Edit user</a>
                </th>
            </tr>
        </thead>
        <tr>
            <th>ID</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <th>Email</th>
            <th>{{$user->email}}</th>
        </tr>
        <tr>
            <th>Registered At:</th>
            <th>{{$user->created_at->diffForHumans()}}</th>
        </tr>
    </table>

    <div class="card">

            <h4 class="title">Orders</h4>

        <hr>

        <div class="content table-responsive table-full-width">
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Product</th>
                    <th>Quantity</th>

                    <th>Status</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>

                @foreach($user->order as $order)
                    <tr>

                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>
                            @foreach($order->products as $item)
                                {{$item->name}}
                            @endforeach
                        </td>
                        <td>
                            @foreach($order->orderItems as $item)
                                {{$item->quantity}}
                            @endforeach
                        </td>

                        <td>
                            @if($order->status)
                                <span class="label label-success">Confirmed</span>
                            @else
                                <span class="label label-warning">Pending</span>
                            @endif

                        </td>
                        <td>
                            <a href="{{route('user.profile' , $order->id)}}" class="btn btn-outline-dark btn-sm">Details</a>
                        </td>


                    </tr>
                @endforeach




                </tbody>
            </table>

        </div>
    </div>
@endsection
