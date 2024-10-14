<?php

namespace App\Http\Controllers;

use App\Constants\Constants;
use App\Models\Member;
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

            $member = Member::where('email', $googleUser->email)->first();
            if (!$member) {

                $member = Member::create(
                    [
                        'name' => $googleUser->name,
                        'user_name' => $googleUser->name,
                        'google_id' => $googleUser->id,
                        'email' => $googleUser->email,
                        'type' => Constants::STANDARD_USER_TYPE,
                        'status' => Constants::ACTIVE_USER_STATUS
                    ]
                );
            }

            Auth::guard('member')->login($member);
            Alert::success(Constants::ALERT_SUCCESS, __('messages.login_success'))->autoClose(2000);
            $user = Auth::user();
            return redirect()->route('home');
        } catch (\Exception $e) {
            Log::error('Error-loginCallback:', ['message' => $e->getMessage(), 'stack' => $e->getTraceAsString()]);
            Alert::success(Constants::ALERT_FAILED, __('messages.login_failed'))->autoClose(2000);

            return redirect()->route('member.login');
        }
    }
}
