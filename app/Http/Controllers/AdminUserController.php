<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index(){
        return view('admin.login');
    }

    public function store(Request $request){
       // dd($request->all());
        $request ->validate([
           'email' => 'required |email',
            'password' => 'required'
        ]);
        //Log the user in
        $credentials = $request->only('email', 'password');
        if(! Auth::guard('admin')->attempt($credentials)){
            return back()->withErrors([
               'message' => 'Wrong credentials please try again'
            ]);
        }

        //Session msg
        session()->flash('msg','You have been logged in' );
        //Redirect
        return redirect('/admin');
    }
}
