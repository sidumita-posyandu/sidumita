<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
class ForgetPasswordController extends Controller
{
    public function index(){
        return view('auth.passwords.email');
    }

    public function store(Request $request){
        $response = Http::post(env('BASE_API_URL').'auth/sendPasswordResetLink', [
            'email' => $request->email,
        ]);

        return view('auth.passwords.cek-email');
    }

    public function getResetRequest(Request $request){
        $token = $request->token;
        $email = $request->email;

        return view('auth.passwords.reset', compact('email', 'token'));
    }

    public function setResetRequest(Request $request){
        $validasi = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required',
            'password' => 'required|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'password_confirmation' => 'required|string|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/'
        ]);

        if($validasi->fails()){
            $request->session()->put('ganti_password', 'Password minimal menggunakan 1 huruf kapital, dan 1 angka');
            return redirect()->back();  
        }

        if($request->password != $request->password_confirmation){
            $request->session()->put('ganti_password', 'Password dan konfirmasi password tidak cocok');
            return redirect()->back();  
        }

        $response = Http::post(env('BASE_API_URL').'auth/resetPassword', [
            'resetToken' => $request->token,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
                
        return redirect('login');
    }
}
