<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function cartList(){
        $itens = \Cart::getContent();
        return view('cart', compact('itens'));
    }
    public  function addCart(Request $request){
        \Cart::add([

            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => abs($request->qty),
            'attributes' => array(
                'image' =>$request->img
            )

        ]);

        return redirect()->route('cart')->with('success', 'Produto adicionado com sucesso!');
    }

    public function removeCart(Request $request){

        \Cart::remove($request->id);
        return redirect()->route('cart')->with('success', 'Produto removido com sucesso!');
 
    }

    public function updateCart(Request $request){
        \Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => abs($request->quantity),
            ]
            ]);
            return redirect()->route('cart')->with('success', 'Quantidades atualizadas com sucesso!');    
    }

    public function clearCart(){
        \Cart::clear();
        return redirect()->route('cart')->with('notice', 'Seu carrinho está vazio!');    
    }
}
