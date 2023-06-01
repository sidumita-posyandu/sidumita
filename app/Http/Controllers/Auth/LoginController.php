<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'auth/logout')
            ->json();

        return redirect('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $response = Http::post(env('BASE_API_URL').'auth/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if($response->getStatusCode() == 401){
            return Redirect::back()->withErrors(['message' => 'Email atau password salah!']);
        }
        elseif($response->getStatusCode() == 500){
            return Redirect::back()->withErrors(['message' => 'Terjadi kesalahan pada server']);
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
            ->get(env('BASE_API_URL').'auth/user')
            ->json();
        
        $user = $response['data'];

        return view('layouts.app', compact('user'));
    }
}