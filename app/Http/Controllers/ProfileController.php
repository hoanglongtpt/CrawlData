<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extension\Extension;
use App\Models\PageDowload;

class ProfileController extends Controller
{
    public function profile (Request $request) {
        $categories = PageDowload::all();
        return view('member.profile', compact(['categories']));
    }
}
