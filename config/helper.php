<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Auth;

function getCategories(){
    return Category::select('id', 'name')->get();
}

function getCategoriesByLimit(){
    return Category::select('id', 'name')->limit(10)->get();
}

function getSubCategories ($id){
    return SubCategory::where('category_id', $id)->get();
}

function getCartQuantity(){

    $user = Auth::user();
    $totalQuantity = 0;

    if ($user) {
        $totalQuantity = Cart::where('user_id', $user->id)->sum('quantity');
    }
    return $totalQuantity;
}

function getTotalPrice(){

    $user = Auth::user();
    $total = 0;

    if ($user) {
        $cartItems = Cart::where('user_id', $user->id)->get();

        foreach($cartItems as $item){
            $total += $item->price * $item->quantity;
        }
    }

    return $total;
}

function getCartItems(){

    $cartItems = [];

    $user = Auth::user();

    if ($user) {
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        return $cartItems;
    }
}
