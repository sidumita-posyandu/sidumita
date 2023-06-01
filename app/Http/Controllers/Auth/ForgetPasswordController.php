<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        request()->validate([
            'token' => 'required',
            'email' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        $response = Http::post(env('BASE_API_URL').'auth/resetPassword', [
            'resetToken' => $request->token,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ]);
                
        return redirect('login');
    }
}
