<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extension\Extension;
use App\Models\PageDowload;

class PaymentController extends Controller
{
    public function payment (Request $request) {
        $categories = PageDowload::all();
        return view('member.payment', compact(['categories']));
    }
}
