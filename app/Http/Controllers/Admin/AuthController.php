<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\LoginAdminRequest;


class AuthController extends Controller
{
    public function login () {
        if (Auth::check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.auth.login');
    }
    public function post_login (LoginAdminRequest $request) {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6',
            ]);
    
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
    
                return redirect()->route('admin.home');
            }
    
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không chính xác.',
            ])->withInput($request->only('email'));
    
        } catch (Exception $e) {
            Log::error('Lỗi đăng nhập:', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
    
            return back()->withErrors([
                'error' => 'Đã có lỗi xảy ra, vui lòng thử lại sau.'
            ])->withInput($request->only('email'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
