<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /**
     * Show the login form
     *
     * @return void
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }
    /**
     * LOg the user via the API
     *
     * @param Request $request
     * @return void
     */
    public function login(Request $request)
    {
        $response = Http::post('https://objective-bohr.87-106-229-150.plesk.page/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        if($response->status()==200){
            $response->json();
            $request->session()->put('user_id', $response['user_id']);
            return redirect()->route('dashboard');
        }else{
            return redirect()->back();
        }

    }
}
