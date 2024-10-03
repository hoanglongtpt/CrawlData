<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extensions\Extension;
use App\Models\PageDowload;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use App\Constants\Constants;

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
        try {
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type', 'freepik')->first();

            if ($request->type)
                $page_item = PageDowload::where('type', $request->type)->first();

            $url = null;
            $id = Extension::GetIDFromLink($request->link);

            if ($request->option == 'icon' && !empty($id))
                $url = ApiService::DownLoadIconFreepik($id);
            elseif ($request->option == 'resource' && !empty($id)) {
                $resource_format = $request->resource_format;
                $url = ApiService::DownLoadResourceFreepik($id, $resource_format);
            }

            if ($url == null) {
                Alert::error(Constants::ALERT_FAILED, ('messages.url_empty'))->autoClose(2000);
                return redirect()->route('home', ['type' => $request->type]);
            }

            return redirect()->route('home', ['type' => $request->type])
                ->with('categories', $categories)
                ->with('page_item', $page_item)
                ->with('url', $url)
                ->with('id', $id);
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.error_server'))->autoClose(2000);
            return redirect()->route('home');
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
            $pythonScriptPath = public_path('python/motionarray.py');
            $command = "python $pythonScriptPath " . escapeshellarg($id);
            $output = shell_exec($command);

            dd($output);
        }
        catch  (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            Alert::error(Constants::ALERT_FAILED, __('messages.error_server'))->autoClose(2000);
            return redirect()->route('home');
        }

    }
}
