<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function store(Request $request){
        $cart= new Cart;
        $cart->user_id=$request->user_id;
        $cart->order=$request->marca;
        $cart->total=$request->total;
        $cart->address=$request->address;
        $cart->save();
    }



}
