<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extension\Extension;
use App\Models\PageDowload;
use App\Models\Transaction;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile (Request $request) {
        $categories = PageDowload::all();
        $user = Auth::guard('member')->user();
        $transactions = Transaction::all();

        if($user){
            return view('member.profile', compact(['categories','user','transactions']));
        }else{
            return redirect()->route('home');
        }
    }
}
