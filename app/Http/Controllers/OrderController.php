<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::all();
        return view('admin.orders.index',compact('orders'));
    }

    public function confirm($id){
        //Find hte Order
        $order = Order::find($id);
        //Update the order
        $order->update(['status' =>1]);
        //Session msg
        session()->flash('msg', 'Order has been confirmed');
        //Redirect the page
        return redirect()->route('admin.orders.index');
    }

    public function pending($id){
        $order = Order::find($id);
        $order->update([
           'status' => 0
        ]);
        session()->flash('msg', 'Order has been again into pending');
        return redirect()->route('admin.orders.index');
    }

    public function show($id){
        $order = Order::find($id);
        return view('admin.orders.details', compact('order'));
    }
}
