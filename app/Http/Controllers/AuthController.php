<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
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

    public function login()
    {
        return view('member.auth.login');
    }

    public function postLogin(LoginMemberRequest $request)
    {
        try {
            $data = $request->only('email', 'password');
            if (Auth::guard('member')->attempt($data)) {
                $request->session()->regenerate();
                Alert::success(Constants::ALERT_SUCCESS, __('messages.login_success'))->autoClose(2000);
                return redirect()->route('home');
            }
            Alert::error(Constants::ALERT_FAILED, __('messages.login_email_password_invalid'))->autoClose(2000);
            return back();
        } catch (Exception $e) {
            Log::error('Lỗi đăng nhập:', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            Alert::error(Constants::ALERT_FAILED, __('messages.error_server'))->autoClose(2000);
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

            Alert::success(Constants::ALERT_SUCCESS, __('messages.signup_success'))->autoClose(2000);

            return redirect()->route($this->route_prefix . 'login');
        } catch (\Exception $e) {
            Log::error('Lỗi đăng kí member :' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.signup_failed'))->autoClose(2000);

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
        return view($this->view_path . 'auth.forgot_password', $data);
    }

    public function reset_password(ForgotPasswordRequest $request)
    {
        try {
            $user = Member::where('email', $request->email)->first();
            if ($user) {
                $newPassword = Str::random(8); // Tạo mật khẩu ngẫu nhiên độ dài 8 ký tự
                $user->password = Hash::make($newPassword);
                $user->save();

                Notification::send($user, new SendEmail($user, $newPassword));
                Alert::success(Constants::ALERT_SUCCESS, __('messages.reset_password'))->autoClose(2000);

                return redirect()->route($this->route_prefix . 'login');
            }
            Alert::error(Constants::ALERT_FAILED, __('messages.user_not_found'))->autoClose(2000);

            return back();
        } catch (\Exception $e) {
            Log::error('Lỗi đặt lại mật khẩu : ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.try_again'))->autoClose(2000);

            return back();
        }
    }

    public function logout(Request $request)
    {
        try {
            Auth::guard('member')->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();
            Alert::success(Constants::ALERT_SUCCESS, __('messages.logout_success'))->autoClose(2000);
            return redirect()->route($this->route_prefix . 'login');
        } catch (\Exception $e) {
            Log::error('Lỗi đăng xuất : ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.logout_failed'))->autoClose(2000);
            return back();
        }
    }
}
