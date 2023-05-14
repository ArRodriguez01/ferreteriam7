<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Load the view
     *
     * @param Request $request
     * @return void
     */
    public function index(Request $request){
        $id = $request->session()->get('user_id', []);
        return view('dashboard',[
            'id'=>$id
        ]);
    }
}
