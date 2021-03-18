<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('front.sessions.index');
    }

    public function store(Request $request){
        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];
        $request->validate($rules);

        //Check if exits
        $data = request(['email', 'password']);
        if(!auth()->attempt($data)){
            return back()->withErrors([
               'message' => 'Wrong credentials please try again'
            ]);
        }
        return redirect('/user/profile');
    }

    public function logout(){
        auth()->logout();

        session()->flash('msg', 'You have been logout successfully');

        return redirect('/user/login');
    }
}
