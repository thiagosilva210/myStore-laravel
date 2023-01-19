<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(5);
        $categories = Category::all();
        return view('admin.products', compact('products', 'categories'));
       // return view('home', compact('products'));
    }

    public function store(Request $request){

        $product = $request->all();

        if($request->img){
            $product['img'] = $request->img->store('products');
        }

        $product['slug'] = Str::slug($request->name);

        $product = Product::create($product);

        return redirect()->route('admin.products')->with('success', 'Produto cadastrado com sucesso');

    }

    public function destroy($id){

        $product = Product::find($id);
        $categories = Category::all();
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Produto removido com sucesso!');

    }
    
}
