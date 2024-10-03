<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Extension\Extension;

class HomeController extends Controller
{
    public function index (Request $request) {

        $pythonScriptPath = public_path('python/motionarray.py');
        $input = "2840629";
        $command = "python $pythonScriptPath " . escapeshellarg($input);
        $output = shell_exec($command);
        dd($output);

        return view('member.index');
    }

    public function GetFreePik (Request $request) {

        $url = '';
        $link = $request -> link ;
        if ($request -> type == 'icon')
        {
            $id = Extension:: GetIDFromLink($link);
            if ($id != '') {
                $url = ApiService :: DownLoadIconFreepik($id);
            }
        }
        else
        {
            $id = Extension:: GetIDFromLink($link);
            $resource_format = $request -> resource_format;
            if ($id != '') {
                $url = ApiService :: DownLoadResourceFreepik($id, $resource_format);
            }
        }

        return view('index.index', compact('url'));
    }
}
