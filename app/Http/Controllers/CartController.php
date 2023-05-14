<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    /**
     * Display the view and create an empty session array key or display the current key
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $cartItems = [];

        foreach ($cart as $productid => $quantity) {
            $stock = Stock::find($productid);
            if ($stock) {
                $cartItems[] = [
                    'stock_id' => $stock->id,
                    'name' => $stock->nombre,
                    'marca'=>$stock->marca,
                    'section'=>$stock->seccion,
                    'price' => $stock->precio,
                    'quantity' => $quantity,
                ];
            }
        }
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        $request->session()->put('cartItems', $cartItems);
        return view('carrito.index', compact('cartItems', 'total'));
    }
    /**
     * Add an object to the array or add 1 to the existent object
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function add(Request $request,$id)
    {
        $stock=Stock::findOrFail($id);
        $cart = $request->session()->get('cart',[]);
        if (isset($cart[$id])) {
            $cart[$id]++;
        } else {
            $cart[$id] = 1;
        }

        $request->session()->put('cart', $cart);

        return redirect()->back();
    }
/**
 * Remove 1 of the quantity on the array
 *
 * @param Request $request
 * @param string $id
 * @return void
 */
    public function remove(Request $request,string $id)
    {
        $stock=Stock::findOrFail($id);
        $cart = $request->session()->get('cart',[]);
            if ($cart[$id]==1){
                unset($cart[$id]);
            }else{
                $cart[$id]--;
            }
        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    /**
     * Delete the object in the array
     *
     * @param Request $request
     * @param string $id
     * @return void
     */
    public function delete(Request $request,string $id)
    {
        $cart = collect($request->session()->get('cart', []));
        $cart->forget($id);
        $request->session()->put('cart', $cart->all());
        return redirect()->route('cart.index');
    }
    /**
     * Save the cart to the db
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $cart = $request->session()->get('cartItems', []);
        $id = $request->session()->get('user_id', []);
        $orden="";
        $total=0;
        foreach($cart as $item){
            $orden.="Item: ".$item['name'].", Precio ud: ".$item['price'].", Cantidad: ".$item['quantity'].";";
            $total += $item['price'] * $item['quantity'];
        }
        $response = Http::post('https://objective-bohr.87-106-229-150.plesk.page/api/carts', [
            'user_id'=>$id,
            'order'=>$orden,
            'total'=>$total,
            'address' => $request->address
        ]);
        if($response->status()==200){
            $response->json();
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }

    }
    /**
     * Filter the cart by user_id
     *
     * @param Request $request
     * @return void
     */
    public function show(Request $request){
        $id=$request->session()->get('user_id', []);
        $response = Http::get('https://objective-bohr.87-106-229-150.plesk.page/api/carts/'.$id);
        $pedidos=$response->json();
        return view('carrito.show',[
            'pedidos'=>$pedidos
        ]);
    }

}
