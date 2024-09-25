<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Member;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginMemberRequest;
use App\Http\Requests\RegisterMemberRequest;

use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Support\Facades\Notification;
use App\Notifications\SendEmail;

class AuthController extends Controller
{
    public $route_prefix = 'member.';
    public $view_path = 'member.';

    public function login () {
        return view('member.auth.login');
    }

    public function postLogin(LoginMemberRequest $request)
    {
        try {
            $data = $request->only('email', 'password');
            if (Auth::guard('member')->attempt($data)) {
                $request->session()->regenerate();
                Alert::success('Thành công', 'Đăng nhập thành công!')->autoClose(2000);
                return redirect()->route('home');
            }
            Alert::error('Thất bại', 'Email hoặc mật khẩu không chính xác!')->autoClose(2000);
            return back();
        } catch (Exception $e) {
            Log::error('Lỗi đăng nhập:', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            Alert::error('Thất bại', 'Đã có lỗi xảy ra, vui lòng thử lại sau.')->autoClose(2000);
            return back();
        }
    }

    public function register(Request $request)
    {
        if (Auth::guard('member')->check()) {
            return redirect()->route($this->route_prefix . 'home');
        }
        $data = [
            'route_prefix' => $this->route_prefix
        ];
        return view($this->view_path . 'auth.register', $data);
    }

    public function postRegister(RegisterMemberRequest $request)
    {
        try {
            $member = new Member();
            $member->name = $request->name;
            $member->email = $request->email;
            $member->password = Hash::make($request->password);
            $member->save();
    
            Alert::success('Thành công', 'Đăng kí thành công!')->autoClose(2000);
            
            return redirect()->route($this->route_prefix.'login');
        } catch (\Exception $e) {
            Log::error('Lỗi đăng kí member :' .$e->getMessage());
            Alert::error('Thất bại', 'Khởi tạo không thành công!')->autoClose(2000);

            return back();
        }
    }

    public function forgot_password()
    {
        if (Auth::guard('member')->check()) {
            return redirect()->route($this->route_prefix . 'home');
        }
        $data = [
            'route_prefix' => $this->route_prefix
        ];
        return view($this->view_path.'auth.forgot_password',$data);
    }

    public function reset_password(ForgotPasswordRequest $request)
    {
        try {
            $user = Member::where('email', $request->email)->first();
            if($user){
                $newPassword = Str::random(8); // Tạo mật khẩu ngẫu nhiên độ dài 8 ký tự
                $user->password = Hash::make($newPassword);
                $user->save();

                Notification::send($user, new SendEmail($user, $newPassword));
                Alert::success('Thành công', 'Mật khẩu đã được đặt lại. Vui lòng kiểm tra email !')->autoClose(2000);
                
                return redirect()->route($this->route_prefix.'login');
            } 
            Alert::error('Thất bại', 'Không tìm thấy người dùng!')->autoClose(2000);

            return back();
        } catch (\Exception $e) {
            Log::error('Lỗi đặt lại mật khẩu : '.$e->getMessage());
            Alert::error('Thất bại', 'Vui lòng thử lại sau !')->autoClose(2000);

            return back();
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::guard('member')->logout();
    
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Alert::success('Thành công', 'Đăng xuất thành công!')->autoClose(2000);
            return redirect()->route($this->route_prefix.'login');
        } catch (\Exception $e) {
            Log::error('Lỗi đăng xuất : '.$e->getMessage());
            Alert::error('Thất bại', 'Đã có lỗi xảy ra, vui lòng thử lại sau.')->autoClose(2000);
            return back();
        }
    }
}
