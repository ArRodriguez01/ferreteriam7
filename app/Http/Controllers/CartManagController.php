<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartManagController extends Controller
{
    /**
     * Show all the items on the db
     *
     * @return void
     */
    public function index(){
        $response = Http::get('https://objective-bohr.87-106-229-150.plesk.page/api/carts');
        $cart=$response->json();
        return view("carrito.gestion",[
            'carts'=>$cart
        ]);
    }
    /**
     * Delete an item from the db with the api
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id){
        $response = Http::delete('https://objective-bohr.87-106-229-150.plesk.page/api/carts/'.$id);
        $stock=$response->json();
        return redirect(route("cartmanag.index"));
    }
    /**
     * Displays the update form
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id){
        $cart=Cart::findorFail($id);
        return view('carrito.update',[
            'pedido'=>$cart
        ]);

    }
    /**
     * Updates de model in the database via API
     *
     * @param Request $request
     * @return void
     */
    public function update(Request $request,$id){
        $response = Http::put('https://objective-bohr.87-106-229-150.plesk.page/api/carts/'.$id,[
            'total' => $request->total,
            'address' => $request->address,
        ]);
        return redirect(route("cartmanag.index"));

    }
}
