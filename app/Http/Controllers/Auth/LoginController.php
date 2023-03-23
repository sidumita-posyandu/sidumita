<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Response;
use Redirect;


class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();

        return redirect('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $response = Http::post('http://127.0.0.1:8080/api/auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($response->getStatusCode() == 401){
            return Redirect::back()->withErrors(['message' => 'Email atau password salah!']);
        }
        
        $token = json_decode((string) $response->getBody(), true)['access_token'];
        $user = json_decode((string) $response->getBody(), true)['user'];

        $request->session()->put('token',$token);
        $request->session()->put('userAuth',$user);
        
        return redirect()->route('home');
    }

    public function user(){
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get('http://127.0.0.1:8080/api/user')
            ->json();
        
        $user = $response['data'];

        return view('layouts.app', compact('user'));
    }
}