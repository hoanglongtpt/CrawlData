<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extension\Extension;
use App\Models\PageDowload;
use PayOS\PayOS;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use App\Constants\Constants;
use App\Models\Member;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAmountRequest;


class PaymentController extends Controller
{
    public function payment (Request $request) {
        $categories = PageDowload::all();
        return view('member.payment', compact(['categories']));
    }

    public function checkout () {
        $categories = PageDowload::all();
        return view('payment.checkout',compact(['categories']));
    }
    public function success (Request $request) {
        $categories = PageDowload::all();
        $transaction = Transaction::where('order_code',$request->orderCode)->first();
        if ($transaction) {
            $transaction->status = 1;
            $transaction->save();

            $member = Member::findOrFail($transaction->member_id);
            if ($member) {
                $member->account_balance += (($transaction->amount)/1000);
                $member->save();
            }
        }
        return view('payment.success',compact(['categories']));
    }
    public function cancel (Request $request) {
        $transaction = Transaction::where('order_code',$request->orderCode)->first();
        if ($transaction) {
            $transaction->status = -1;
            $transaction->save();
        }
        $categories = PageDowload::all();
        return view('payment.cancel',compact(['categories']));
    }

    public function createPaymentLink(StoreAmountRequest $request) {
        try {
            $member = Auth::guard('member')->user();
            $amount = (int) $request->amount;
            $data = [
                "orderCode" => intval(substr(strval(microtime(true) * 10000), -6)),
                "amount" => $amount,
                "description" => $member->user_name,
                "returnUrl" => route('checkout.success'),
                "cancelUrl" => route('checkout.cancel'),
            ];
            // lưu vào lịch sử transaction 
            $transaction = new Transaction();
            $transaction->member_id = $member->id;
            $transaction->type	 = "DEPOSIT";
            $transaction->amount = $request->amount;
            $transaction->status = 2;
            $transaction->order_code = $data['orderCode'];
            $transaction->save();

            error_log($data['orderCode']);
            $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
            $PAYOS_API_KEY = env('PAYOS_API_KEY');
            $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');
    
            $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
            try {
                $response = $payOS->createPaymentLink($data);
                return redirect($response['checkoutUrl']);
                // $response = $payOS->getPaymentLinkInformation($data['orderCode']);
                // return $response;
            } catch (\Throwable $th) {
                return $th->getMessage();
            }
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.error_server'))->autoClose(2000);
            return redirect()->route('checkout');
        }
    }

    public function handlePayOSWebhook(Request $request)
    {
        try {
            $body = json_decode($request->getContent(), true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Invalid JSON payload');
            }
            // Handle webhook test

            // Check webhook data integrity 
            $PAYOS_CHECKSUM_KEY = env('PAYOS_CHECKSUM_KEY');
            $PAYOS_CLIENT_ID = env('PAYOS_CLIENT_ID');
            $PAYOS_API_KEY = env('PAYOS_API_KEY');

            $webhookData = $body["data"];
            $payOS = new PayOS($PAYOS_CLIENT_ID, $PAYOS_API_KEY, $PAYOS_CHECKSUM_KEY);
            $payOS->verifyPaymentWebhookData($webhookData);

            return response()->json([
                "error" => 0,
                "message" => "Ok",
                "data" => $webhookData
            ]);
        
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.error_server'))->autoClose(2000);
            return redirect()->route('checkout');
        }
    }

}
