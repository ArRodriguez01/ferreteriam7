<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockManagController extends Controller
{
    public function index(){
        $response = Http::get('https://objective-bohr.87-106-229-150.plesk.page/api/stocks');
        $stock=$response->json();
        return view("stock.gestion",[
            'stocks'=>$stock
        ]);
    }
    public function delete($id){
        $response = Http::delete('https://objective-bohr.87-106-229-150.plesk.page/api/stocks/'.$id);
        $stock=$response->json();
        return redirect(route("stockmanag.index"));
    }
    public function store(Request $request){
        $response = Http::post('https://objective-bohr.87-106-229-150.plesk.page/api/stocks',[
            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'seccion'=>$request->seccion,
            'precio'=>$request->precio
        ]);
        return redirect(route("stockmanag.index"));
    }
}
