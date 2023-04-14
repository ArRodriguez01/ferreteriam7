<?php

namespace App\Http\Controllers\Api;

use App\Models\Stock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stock=Stock::all();
        if($stock)
        return response()->json([
            'success'=>true,
            'data'=>$stock
        ]);
        return response()->json([
            'success'=>false,
            'data'=>'No hay nada a la venta'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock= new Stock;
        $stock->nombre=$request->nombre;
        $stock->marca=$request->marca;
        $stock->seccion=$request->seccion;
        $stock->precio=$request->precio;
        $stock->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        if($stock){
            return response()->json([
                'success'=>true,
                'data'=>$stock
            ]);
        }
        return response()->json([
            'success'=>false,
            'data'=>'Stock not found'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $stock=Stock::find($id);
        if($stock!=null){
            $stock->nombre=$request->nombre;
            $stock->marca=$request->marca;
            $stock->seccion=$request->seccion;
            $stock->precio=$request->precio;
            $stock->save();
            return response()->json([
                'success'=>true,
                'data'=>'Producto actualizado'
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'Producto no actualizado'
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock=Stock::find($id);
        if($stock!=null){
            $stock->delete();
            return response()->json([
                'success'=>true,
                'data'=>'Producto eliminado'
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'data'=>'Producto no encontrado'
            ]);
        }
    }
}
