<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

//use Illuminate\Support\Facades\Gate;



class SiteController extends Controller
{
     //
     public function index(){
        $products = Product::paginate(3);

        return view('home', compact('products'));
    }

    public function details($slug){

        $product = Product::where('slug', $slug)->first();

       // Gate::authorize('see-product', $product);

        return view('details', compact('product'));

    }
    
    public function category($id){

        $category = Category::find($id);
        $products = Product::where('id_category', $id)->paginate(3);

        return view('category', compact('products', 'category'));

    }




}
