<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Services\SeleniumService;
use App\Extensions\Extension;
use App\Models\PageDowload;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use App\Constants\Constants;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Support\Str;



class HomeController extends Controller
{
    public function index (Request $request) {
        try
        {
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type','freepik')->first();
            if ($request->type) {
                $page_item = PageDowload::where('type',$request->type)->first();
            }

            return view('member.index',compact(['categories','page_item']));
        }
        catch (\Exception $e)
        {
            Log::error('Lỗi : ' . $e->getMessage());
            return redirect()->route('home');
        }
    }

    public function GetFreePik(Request $request) {
        DB::beginTransaction();
        try {
            if (!(Auth::guard('member')->check())) {
                return response()->json(['error' => 'Vui lòng đăng nhập để tải!'], 400);
            }
            if (!(Str::contains($request->link, 'freepik'))) {
                return response()->json(['error' => 'Link không hợp lệ'], 400);
            }
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type', 'freepik')->first();

            $member = Member::findOrFail(Auth::guard('member')->id());
            if ( $member && ($member->account_balance < $page_item->amount)) {
                return response()->json(['error' => 'Số dư không đủ, vui lòng nạp thêm tiền!'], 400);
            }

            if ($request->type) {
                $page_item = PageDowload::where('type', $request->type)->first();
            }
            
            $url = null;

            $id = Extension::GetIDFromLink($request->link);
            $postType = Extension::GetTypeDowload($request->link);
            
            if ($postType == 'video') {
                $url = ApiService::DownLoadVideoFreepik($id);
            }else{
                if ($postType == 'icon') 
                {
                    $url = ApiService::DownLoadResourcePreniumFreepik($id,$postType);
                }else{
                    $url = ApiService::DownLoadResourcePreniumFreepik($id);
                }
            }
         
            if ($url == null || $url == 400) {
                return response()->json(['error' => __('messages.url_empty')], 400);
            }
            
            $member->account_balance -= $page_item->amount;
            $member->save();

            // lưu vào lịch sử transaction 
            $transaction = new Transaction();
            $transaction->member_id = $member->id;
            $transaction->type	 = 'dowload_'.$page_item->type;
            $transaction->amount = $page_item->amount*1000;
            $transaction->page_id = $page_item->id;
            $transaction->status = 1;
            $transaction->quantity = 1;
            $transaction->save();
            DB::commit();
            // Tạo mảng với tất cả dữ liệu cần truyền
            // $data = [
            //     'categories' => $categories,
            //     'page_item' => $page_item,
            //     'url' => $url,
            //     'id' => $id,
            // ];
            // Chuyển hướng và truyền dữ liệu
            return response()->json([
                'url' => $url,
                'page_item' => $page_item,
                'id' => $id,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return response()->json(['error' => __('messages.error_server')], 500);
        }
    }


    public function GetMotionArray(Request $request){
        DB::beginTransaction();
        try{
            if (!(Auth::guard('member')->check())) {
                return response()->json(['error' => 'Vui lòng đăng nhập để tải!'], 400);
            }
            if (!(Str::contains($request->link, 'motionarray'))) {
                return response()->json(['error' => 'Link không hợp lệ'], 400);
            } 
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type', 'motion-array')->first();
            $member = Member::findOrFail(Auth::guard('member')->id());
            if ( $member && ($member->account_balance < $page_item->amount)) {
                return response()->json(['error' => 'Số dư không đủ, vui lòng nạp thêm tiền!'], 400);
            }

            if ($request->type){
                $page_item = PageDowload::where('type', $request->type)->first();
            }
            $url = null;
            $id = Extension::GetIDFromLink($request->link);
            $url = SeleniumService::DownLoadResourceMotionarray($id);

            if ($url == null || $url == 400) {
                return response()->json(['error' => __('messages.url_empty')], 400);
            }

            $member->account_balance -= $page_item->amount;
            $member->save();

            // lưu vào lịch sử transaction 
            $transaction = new Transaction();
            $transaction->member_id = $member->id;
            $transaction->type	 = 'dowload_'.$page_item->type;
            $transaction->amount = $page_item->amount*1000;
            $transaction->page_id = $page_item->id;
            $transaction->status = 1;
            $transaction->quantity = 1;
            $transaction->save();
            DB::commit();
            
            return response()->json([
                'url' => $url,
                'page_item' => $page_item,
                'id' => $id,
            ]);
        }
        catch  (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return response()->json(['error' => __('messages.error_server')], 500);
        }

    }

    public function GetEvato(Request $request){
        DB::beginTransaction();
        try{
            if (!(Auth::guard('member')->check())) {
                return response()->json(['error' => 'Vui lòng đăng nhập để tải!'], 400);
            }
            if (!(Str::contains($request->link, 'envato'))) {
                return response()->json(['error' => 'Link không hợp lệ'], 400);
            } 
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type', 'envato')->first();
            $member = Member::findOrFail(Auth::guard('member')->id());
            if ( $member && ($member->account_balance < $page_item->amount)) {
                return response()->json(['error' => 'Số dư không đủ, vui lòng nạp thêm tiền!'], 400);
            }

            if ($request->type){
                $page_item = PageDowload::where('type', $request->type)->first();
            }
            $url = null;
            $id = Extension::GetIDFromEvanto($request->link);
            $url = ApiService::DownLoadResourceEnvato($request->link);

            if ($url == null || $url == 400) {
                return response()->json(['error' => __('messages.url_empty')], 400);
            }

            $member->account_balance -= $page_item->amount;
            $member->save();

            // lưu vào lịch sử transaction 
            $transaction = new Transaction();
            $transaction->member_id = $member->id;
            $transaction->type	 = 'dowload_'.$page_item->type;
            $transaction->amount = $page_item->amount*1000;
            $transaction->page_id = $page_item->id;
            $transaction->status = 1;
            $transaction->quantity = 1;
            $transaction->save();
            DB::commit();
            
            return response()->json([
                'url' => $url,
                'page_item' => $page_item,
                'id' => $id,
            ]);
        }
        catch  (\Exception $e) {
            DB::rollBack();
            Log::error('Error: ' . $e->getMessage());
            return response()->json(['error' => __('messages.error_server')], 500);
        }

    }
}
