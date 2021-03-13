<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
       // $user = User::find($id);
        $orders = Order::where('user_id', $id)->get();

        return view('admin.users.details', compact('orders'));
    }
}
