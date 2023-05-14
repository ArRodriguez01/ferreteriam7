<?php

namespace App\Http\Controllers;

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
}
