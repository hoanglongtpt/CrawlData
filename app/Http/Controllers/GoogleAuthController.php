<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;

/**
 * Authentication by Google
 */
class GoogleAuthController extends Controller
{
    /**
     * Get google auth url
     * @return url
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Get google's user and register if not exist
     * @return home page if success
     */
    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            //TODO 
            // 1. xác định lại khi login/register thì save vào user hay member,
            // 2. field password có cần thiết cho login by google
            // 3. xác định lại các loại status, type của member và user => tạo file enum lưu vào app/Constants hoặc tạo table role ở db để lưu
            // 4. member khác user chỗ nào, những column đều có ở 2 table thì chỉ nên tạo ở user, 
            // table member kế thừa lại và chỉ tạo những column riêng giành cho member
            $user = User::where('email', $googleUser->email)->first();
            if (!$user) {

                $user = User::create(
                    [
                        'email' => $googleUser->email,
                        'name' => $googleUser->name,
                        'google_id' => $googleUser->id,
                        'user_name' => $googleUser->name,
                        'type' => 'member',
                        'password' => '123',
                        'status' => '1'
                    ]
                );
            }

            Auth::login($user);
            Alert::success(Constants::ALERT_SUCCESS, __('messages.login_success'))->autoClose(2000);

            return redirect()->route('home');
        } catch (\Exception $e) {
            Log::error('Error-loginCallback:', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            Alert::success(Constants::ALERT_FAILED, __('messages.login_failed'))->autoClose(2000);

            return redirect()->route('member.login');
        }
    }
}
