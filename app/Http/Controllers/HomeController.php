<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extensions\Extension;
use App\Models\PageDowload;
use Illuminate\Support\Facades\Log;



class HomeController extends Controller
{
    public function index (Request $request) {
        try {
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type','freepik')->first();
            if ($request->type) {
                $page_item = PageDowload::where('type',$request->type)->first();
            }

            return view('member.index',compact(['categories','page_item']));
        } catch (\Exception $e) {
            Log::error('Lỗi : ' . $e->getMessage());
            return redirect()->route('home');
        }
    }

    public function GetFreePik (Request $request) {

        try {
            $categories = PageDowload::all();
            $page_item = PageDowload::where('type','freepik')->first();
            if ($request->type) {
                $page_item = PageDowload::where('type',$request->type)->first();
            }

            $url = '';
            $link = $request->link;
            if ($request->type == 'icon')
            {
                $id = Extension::GetIDFromLink($link);
                if ($id != '') {
                    $url = ApiService::DownLoadIconFreepik($id);
                }
            }
            else
            {
                $id = Extension::GetIDFromLink($link);
                $resource_format = $request->resource_format;
                if ($id != '') {
                    $url = ApiService::DownLoadResourceFreepik($id, $resource_format);
                }
            }
            return view('member.index', compact(['categories','page_item','url']));
        } catch (\Exception $e) {
            Log::error('Lỗi : ' . $e->getMessage());
            return redirect()->route('home');
        }
    }
}
