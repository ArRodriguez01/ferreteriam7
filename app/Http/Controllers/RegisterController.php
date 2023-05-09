<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $response = Http::post('https://objective-bohr.87-106-229-150.plesk.page/api/register', [
            'email' => $request->email,
            'password' => $request->password,
            'name'=>$request->name,
            'password_confirmation'=>$request->password_confirmation
        ]);
        return redirect('/login');
    }
}
