<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     * Creates an object and saves it on the db
     *
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){
        $cart= new Cart;
        $cart->user_id=$request->user_id;
        $cart->order=$request->order;
        $cart->total=$request->total;
        $cart->address=$request->address;
        $cart->save();
        return response()->json([
            'message' => 'Pedido realizado'
        ]);
    }
    public function index(){
        $cart=Cart::all();
        if(count($cart)!=0){
            return response()->json([
                'success'=>true,
                'data'=>$cart
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'No hay pedidos realizados'
            ]);
        }
    }
    /**
     * Filter by object
     *
     * @param Cart $cart
     * @return void
     */
    public function show(Cart $cart)
    {
        if($cart){
            return response()->json([
                'success'=>true,
                'data'=>$cart
            ]);
        }
        return response()->json([
            'success'=>false,
            'data'=>'Pedido not found'
        ]);
    }
    /**
     * Filter a cart by user_id
     *
     * @param [type] $id
     * @return void
     */
    public function filter($id){
        $cart=Cart::where('user_id',$id)->get();
        if(count($cart)!=0){
            return response()->json([
                'success'=>true,
                'data'=>$cart
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'No tienes pedidos'
            ]);
        }

    }
    /**
     * Delete an object
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id){
        $cart=Cart::find($id);
        if($cart!=null){
            $cart->delete();
            return response()->json([
                'success'=>true,
                'data'=>'Pedido eliminado'
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'Pedido no encontrado'
            ]);
        }

    }
    /**
     * Updates the model in the db
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request,$id)
    {
        $cart=Cart::find($id);
        if($cart!=null){
            $cart->address=$request->address;
            $cart->total=$request->total;
            $cart->save();
            return response()->json([
                'success'=>true,
                'data'=>'Pedido actualizado'
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'Pedido no actualizado'
            ]);
        }

    }




}
