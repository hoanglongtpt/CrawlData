<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extension\Extension;

class PaymentController extends Controller
{
    public function payment (Request $request) {


        return view('member.payment');
    }
}
