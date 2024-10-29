<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageDowload;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(Request $request)
    {
        $categories = PageDowload::all();
        $user = Auth::guard('member')->user();
        $memberId = $user->id;

        $query = Transaction::with('member');
        $query->whereHas('member', function ($query) use ($memberId) {
            $query->where('member_id', $memberId);
        });

        $transactions = $query->orderBy('created_at', 'desc')->paginate(10);

        $tab = $request->get('tab', 'tab1');
        if ($user) {
            return view('member.profile', compact(['categories', 'user', 'transactions', 'tab']));
        } else {
            return redirect()->route('home');
        }
    }
}
