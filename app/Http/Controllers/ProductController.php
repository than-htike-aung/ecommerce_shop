<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create(){
        $product = new Product();
        return view('admin.products.create', compact('product'));
    }

    public function store(Request $request){
        //dd($request->all());

        $request->validate([
           'name' => 'required',
           'price' => 'required',
           'description' => 'required',
           'image' => 'required|image'
        ]);

        //upload the image
        if($request->hasFile('image')){
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }
        //save the data into database
        Product::create([
           'name' => $request->name,
           'price' => $request->price,
           'description' => $request->description,
           'image' => $request->image->getClientOriginalName()
        ]);

        //Session Msg
        $request->session()->flash('msg', 'Your product has been added');

        return redirect()->route('admin.products.create');

    }

    public function destroy($id){
        Product::destroy($id);

        session()->flash('msg', 'Product has been deleted');

        return redirect()->back();
    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));

    }

    public function update(Request $request, $id){
        //Find the product
        $product = Product::find($id);

        //Validate hte form
        $this->validate($request, [
           'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);

        //Check if there is any image
        if($request->hasFile('image')){
            if(file_exists(public_path('uploads/').$product->image)){
                unlink(public_path('uploads/').$product->image);
            }

            //upload the new image
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
            $product->image = $request->image->getClientOriginalName();
        }

        //Updating the product

        $product->update([
           'name' => $request->name,
           'price' => $request->price,
           'description' => $request->description,
           'image' => $product->image
        ]);

        //Store a message in session
        $request->session()->flash('msg' , 'Product has been updated');

        //Redirect
        return redirect()->back();

    }

    public function show($id){
        $product = Product::find($id);
        return view('admin.products.detail', compact('product'));
    }

}
