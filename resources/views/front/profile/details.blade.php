@extends('front.layouts.master')

@section('content')
    <h1>User Order Details Page</h1>
    <hr>

    <div class="row">
        <div class="col-md-12">

                <div class="content table-responsive table-full-width">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th colspan="7">Order Details</th>
                        </tr>
                        <tr>
                            <td>ID</td>
                            <td>Date</td>
                            <td>Quantity</td>
                            <td>Address</td>
                            <td>Price</td>
                            <td>Status</td>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->date}}</td>
                            <td>{{$order->orderItems[0]->quantity}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->orderItems[0]->price}}</td>
                            <td>
                                @if($order->status)
                                    <span class="badge badge-success">Confirmed</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        <div class="col-md-6">
                    <h4 class="title">User Details</h4>
            <hr>
                <div class="content table-responsive  table-full-width">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>{{$order->user->id}}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$order->user->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$order->user->email}}</td>
                        </tr>
                        <tr>
                            <td>Registered </td>
                            <td>{{$order->user->created_at->diffForHumans()}}</td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

        <div class="col-md-6">
                    <h4 class="title">Product Details</h4>
            <hr>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>{{$order->products[0]->id}}</td>
                        </tr>
                        <tr>
                            <td>Name</td>
                            <td>{{$order->products[0]->name}}</td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>$ {{$order->products[0]->price}}</td>
                        </tr>
                        <tr>
                            <td>Image </td>
                            <td>
                                {{--  call image method--}}
                                {{--  {{url('uploads/', $order->products[0]->image)}}--}}

                                <a href="{{asset('/uploads/'. $order->products[0]->image)}}" target="blank">
                                    <img src="{{asset('/uploads/'. $order->products[0]->image)}}" alt="{{$order->products[0]->image}}" class="img-thumbnail" style="width: 100px">
                                </a>
                            </td>
                        </tr>
                        </thead>
                    </table>
                </div>

        </div>
    </div>
@endsection
