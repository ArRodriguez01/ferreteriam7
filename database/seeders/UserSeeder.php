<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User();
        $user->name="admin";
        $user->email="admin@ferro.com";
        $user->password = bcrypt('secret');
        $user->save();

        $user=new User();
        $user->name="cliente";
        $user->email="cliente@ferro.com";
        $user->password = bcrypt('cliente');
        $user->save();
    }
}
