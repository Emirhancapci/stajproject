<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $product = Product::findOrFail($request->input('product_id'));
        $cartItem = Cart::where('product_id', $product->id)->where('user_id', Auth()->user()->id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cartItem = new Cart();
            $cartItem->product_id = $product->id;
            $cartItem->user_id = Auth()->user()->id;
            $cartItem->quantity = 1;
            $cartItem->price = $product->discount;
            $cartItem->save();
        }
        Alert::success('Ürün Sepete Eklendi')->autoClose(1000);
        return back();
    }

    public function increaseItem($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);
        $cartItem->quantity += 1;
        $cartItem->save();
        return back();
    }

    public function decreaseItem($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);
        if ($cartItem->quantity > 1) {
            $cartItem->quantity -= 1;
            $cartItem->save();
        } else {
            $cartItem->delete();
        }
        return back();
    }

    public function removeItem($cartItemId)
    {
        $cartItem = Cart::findOrFail($cartItemId);

        if($cartItem){
            $cartItem->delete();
        }
        return back();
    }

    public function clearCart()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        return back();
    }
}
