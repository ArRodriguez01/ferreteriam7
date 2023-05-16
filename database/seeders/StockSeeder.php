<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //
        $stock=new Stock();
        $stock->nombre="Alicates pico de loro";
        $stock->seccion="Alicates";
        $stock->marca="Bosch";
        $stock->precio=8.50;
        $stock->save();
        //
        $stock=new Stock();
        $stock->nombre="Taladro Percutor";
        $stock->seccion="Taladros";
        $stock->marca="Bosch";
        $stock->precio=50.90;
        $stock->save();
        //
        $stock=new Stock();
        $stock->nombre="Soplete Oxiacetileno";
        $stock->seccion="Soldadura";
        $stock->marca="Welder";
        $stock->precio=15.98;
        $stock->save();
    }
}
