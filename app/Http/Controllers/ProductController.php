<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product:: all(); //$products is an variable
        return view ('product.index',['products'=> $products]);
    }
    public function create(){
        return view ('product.create');
    }
    public function store(Request $request)
    {
        $data = $request-> validate([
            'name' => 'required',
            'category' => 'required',
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required|numeric',
            'initial_price' => 'required|numeric',
            'last_rented_price' => 'required|numeric',
            'description'=> 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        
        $imagePath = null;
        if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        }

        $newProduct = new Product();
        $newProduct->name = $data['name'];
        $newProduct->category = $data['category'];
        $newProduct->color = $data['color'];
        $newProduct->size = $data['size'];
        $newProduct->quantity = $data['quantity'];
        $newProduct->initial_price = $data['initial_price'];
        $newProduct->last_rented_price = $data['last_rented_price'];
        $newProduct->description = $data['description'];
        $newProduct->image = $data['image'] ?? null;
    
        $newProduct->save(); //storing data into db
        
        return redirect (route('product.index')); //after data is stored redirect into index page
    }
    
    public function edit(Product $product){ //Product is the model and $product is the variable

        return view ('product.edit' , ['product' => $product]);

    }

    public function update(Product $product, Request $request){
        $data = $request-> validate([
            'name' => 'required',
            'category' => 'required',
            'color' => 'required',
            'size' => 'required',
            'quantity' => 'required|numeric',
            'initial_price' => 'required|numeric',
            'last_rented_price' => 'required|numeric',
            'description'=> 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        
        $product = new Product();
        $product->name = $data['name'];
        $product->category = $data['category'];
        $product->color = $data['color'];
        $product->size = $data['size'];
        $product->quantity = $data['quantity'];
        $product->initial_price = $data['initial_price'];
        $product->last_rented_price = $data['last_rented_price'];
        $product->description = $data['description'];
        $product->image = $data['image'] ?? null;
        $product->save();

        return redirect(route('product.index'))->with('sucess','Product updated successfully.');

    }

    public function delete(Product $product){ //receive product from the route
        $product-> delete();

        return redirect(route('product.index'))->with('sucess','Product deleted successfully.');
    }
}
