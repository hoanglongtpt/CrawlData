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
    
            if ($request->option == 'icon' && !empty($id)) {
                $url = ApiService::DownLoadIconFreepik($id);
            } elseif ($request->option == 'resource' && !empty($id)) {
                $resource_format = $request->resource_format;
                $url = ApiService::DownLoadResourceFreepik($id, $resource_format);
            }
    
            if ($url == null) {
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
            $data = [
                'categories' => $categories,
                'page_item' => $page_item,
                'url' => $url,
                'id' => $id,
            ];
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
        try{
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type', 'freepik')->first();

            if ($request->type)
                $page_item = PageDowload::where('type', $request->type)->first();

            $url = null;
            $id = Extension::GetIDFromLink($request->link);
            $url = SeleniumService::DownLoadResourceMotionarray($id);
            if ($url == null) {
                Alert::error(Constants::ALERT_FAILED, ('messages.url_empty'))->autoClose(2000);
                return redirect()->route('home', ['type' => $request->type]);
            }

            return redirect()->route('home', ['type' => $request->type])
                ->with('categories', $categories)
                ->with('page_item', $page_item)
                ->with('url', $url)
                ->with('id', $id);
        }
        catch  (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.error_server'))->autoClose(2000);
            return redirect()->route('home');
        }

    }

}
