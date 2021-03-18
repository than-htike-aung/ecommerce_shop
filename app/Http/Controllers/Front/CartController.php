<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
class CartController extends Controller
{
    public function index(){
        return view('front.cart.index');
    }

    public function store(Request $request){
        //dd($request->all());

        $dubl = Cart::search(function ($cartItem, $rowId) use ($request){
           return $cartItem->id === $request->id;
        });
        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg', 'Item is already in your cart');
        }

        Cart::add($request->id, $request->name, 1, $request->price)->associate('App\Models\Product');

        return redirect()->back()->with('msg', 'Item has been added to cart');
    }

    public function destroy($id){
       Cart::remove($id);
       return redirect()->back()->with('msg', 'Item has been removed from cart');
    }

    public function saveLater($id){
       // dd($id);
        $item = Cart::get($id);
        Cart::remove($id);
        $dubl = Cart::instance('saveForLater')->search(function ($cartItem, $rowId) use ($id){
            return $cartItem->id === $id;
        });
        if($dubl->isNotEmpty()){
            return redirect()->back()->with('msg', 'Item is already save for later');
        }


        Cart::instance('saveForLater')->add($item->id, $item->name, 1, $item->price)->associate('App\Models\Product');
        return redirect()->back()->with('msg', 'Item has been saved for later');
    }
}
