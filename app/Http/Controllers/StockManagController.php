<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StockManagController extends Controller
{
    /**
     * Show the view with the stock via the API
     *
     * @return void
     */
    public function index(){
        $response = Http::get('https://objective-bohr.87-106-229-150.plesk.page/api/stocks');
        $stock=$response->json();
        return view("stock.gestion",[
            'stocks'=>$stock
        ]);
    }

    /**
     * Delete the model via API
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id){
        $response = Http::delete('https://objective-bohr.87-106-229-150.plesk.page/api/stocks/'.$id);
        $stock=$response->json();
        return redirect(route("stockmanag.index"));
    }
    /**
     * Store the model via API
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request){
        $response = Http::post('https://objective-bohr.87-106-229-150.plesk.page/api/stocks',[
            'nombre' => $request->nombre,
            'marca' => $request->marca,
            'seccion'=>$request->seccion,
            'precio'=>$request->precio
        ]);
        return redirect(route("stockmanag.index"));
    }
    /**
     * Update the model via API
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function update(Request $request,$id){
        $response = Http::put('https://objective-bohr.87-106-229-150.plesk.page/api/stocks/'.$id,[
            'nombre' => $request->nombre,
            'seccion' => $request->seccion,
            'precio' => $request->precio,
            'marca' => $request->marca,
        ]);
        return redirect(route("stockmanag.index"));
    }
    /**
     * Show the edit view
     *
     * @param [type] $id
     * @return void
     */
    public function edit($id){
        $stock=Stock::findorFail($id);
        return view('stock.update',[
            'stock'=>$stock
        ]);

    }
}
