<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $response = Http::post('https://objective-bohr.87-106-229-150.plesk.page/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $data=json_encode($response);
        $request->session()->put('user_id', $data['user_id']);
        return redirect()->route('dashboard');
    }
}
