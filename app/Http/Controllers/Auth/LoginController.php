<?php

namespace App\Http\Controllers\Auth;

use Redirect;
use stdClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

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
            $request->session()->put('status', 'Email atau password salah');
            return redirect()->back();  
        }
        elseif($response->getStatusCode() == 500){
            $request->session()->put('status', 'Terjadi kesalahan pada server');
            return redirect()->back();  
        }
        
        $token = json_decode((string) $response->getBody(), true)['access_token'];
        $user = json_decode((string) $response->getBody(), true)['user'];

        $request->session()->put('token',$token);
        $request->session()->put('userAuth',$user);
        
        return redirect()->route('home');
    }

    public function user(Request $request){
        $response = Http::accept('application/json')
            ->withToken($request->session()->get('token'))
            ->get(env('BASE_API_URL').'auth/user')
            ->json();
        
        $user = $response['data'];

        return view('layouts.app', compact('user'));
    }
}