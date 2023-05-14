<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Http::get('https://objective-bohr.87-106-229-150.plesk.page/api/stocks');
        $stock=$response->json();
        return view("stock.index",[
            'stock'=>$stock
        ]);
    }


}
